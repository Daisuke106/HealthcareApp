# 新しいHerokuアカウントに空の状態からデプロイする

既存アプリのデータや環境変数は移行せず、新しいアプリとDBを作成します。
旧アプリの停止・課金終了は別途、旧アカウントの復旧後に対応してください。

## 1. アカウントとアプリを作成

Herokuに新規登録し、メール認証・MFA・支払い方法の登録を済ませます。
Dashboardから新しいアプリを作成します。このリポジトリはclassic buildpackを
使うCedar世代、`heroku-24`スタックを対象とします。
PHP 8.2が利用できない`heroku-26`は選択しません。

以下の`YOUR_NEW_APP_NAME`は新しいアプリ名に置き換えてください。
Heroku CLIをインストールした端末で実行します。

```powershell
heroku login
heroku stack --app YOUR_NEW_APP_NAME
heroku buildpacks:set heroku/php --app YOUR_NEW_APP_NAME
heroku buildpacks:add --index 1 heroku/nodejs --app YOUR_NEW_APP_NAME
heroku buildpacks --app YOUR_NEW_APP_NAME
```

ビルド順が`heroku/nodejs`、`heroku/php`であることを確認します。
Node.jsはViteのCSS/JavaScriptをビルドするために必要です。
既存の`heroku-postbuild`スクリプトが`npm run build`を実行します。

## 2. 空のDBと環境変数を設定

DashboardのResourcesから、Heroku Postgresを追加します。
料金とプランを確認してから作成してください。
SettingsのConfig Varsに`DATABASE_URL`が追加されたことを確認します。
接続情報やAPP_KEYをチャットやGitに貼り付ける必要はありません。

```powershell
heroku config:set APP_ENV=production APP_DEBUG=false LOG_CHANNEL=stderr DB_CONNECTION=pgsql CACHE_DRIVER=file SESSION_DRIVER=file SESSION_SECURE_COOKIE=true QUEUE_CONNECTION=sync --app YOUR_NEW_APP_NAME
heroku config:set APP_URL=https://YOUR_NEW_APP_HOSTNAME --app YOUR_NEW_APP_NAME
```

`YOUR_NEW_APP_HOSTNAME`はSettingsに表示される実際のHerokuドメインへ置き換えます。
PHPとComposerを利用できるローカル環境では、リポジトリ直下で
`php artisan key:generate --show`を実行し、出力された値をDashboardの
Config Varsの`APP_KEY`に保存します。これは新規環境用のキーです。
ローカルにPHPがない場合は、手順3の初回ビルド後、
`heroku run "php artisan key:generate --show" --app YOUR_NEW_APP_NAME`
で生成して保存してから、手順4に進みます。
`APP_KEY`が未設定の間はアプリの画面は正常動作しません。

メール送信を使う場合は、実際のSMTPサービスの`MAIL_*`環境変数も設定します。
この手順はメール配送サービスの作成・配送確認までは含みません。

## 3. 修正済みコードをビルド・デプロイ

この手順を含むPRをmasterにマージした後、DashboardのDeployタブでGitHubの
`Daisuke106/HealthcareApp`に接続し、Manual deployから`master`を選んで
Deploy Branchを実行します。

ビルドログで以下を確認します。

- PHPが8.2.35以上の8.2系であること。
- Node.jsのビルドが成功し、`public/build/manifest.json`が生成されること。
- Composerのインストールとデプロイが成功すること。

このリポジトリの`Procfile`は`fpm_custom.conf`を読み込み、PHP-FPM起動時に
`session.upload_progress.enabled=0`を設定します。

## 4. テーブル作成と動作確認

```powershell
heroku run "php artisan migrate --force" --app YOUR_NEW_APP_NAME
heroku run "php artisan migrate:status" --app YOUR_NEW_APP_NAME
heroku ps:scale web=1 --app YOUR_NEW_APP_NAME
heroku ps:restart --app YOUR_NEW_APP_NAME
heroku run "php -v" --app YOUR_NEW_APP_NAME
heroku run "composer check-platform-reqs --no-dev" --app YOUR_NEW_APP_NAME
heroku ps --app YOUR_NEW_APP_NAME
heroku open --app YOUR_NEW_APP_NAME
```

Dynoの起動には選択したプランの料金がかかります。
新規DBには`migrate`だけを実行します。`migrate:fresh`やサンプルデータの
シーディングは不要です。公開URLの`/register`から住所を含む情報を入力し、
新規登録・ダッシュボード表示・ログアウト・再ログインを確認します。
未ログインでトップページを開くとログイン画面へリダイレクトされる構成です。

エラー時は`heroku logs --tail --app YOUR_NEW_APP_NAME`で確認します。
CLIのPHPバージョンだけでなく、Webを起動したリリースのビルドログも確認してください。
ファイル保存先とセッションの既定設定はDyno内の一時領域のため、永続的な
アップロード保存や複数Web Dyno運用には、別途外部ストレージ・共有セッションを設定します。

## 検証範囲

PHP 8.2.35とSQLiteのインメモリーDBで、マイグレーションの作成・全取り消し・
再作成、最初のユーザー登録、空のトップページとダッシュボードの表示、
ログアウト、remember付き再ログインを`FreshDeploymentTest`で確認しています。
Viteはテストでは無効化しているため、実際のアセットビルドとPostgres接続は
Herokuで上記の確認が必要です。

## 公式資料

- [Laravel on Heroku](https://devcenter.heroku.com/articles/getting-started-with-laravel)
- [PHP対応バージョンとスタック](https://devcenter.heroku.com/articles/php-support)
- [複数buildpackの設定](https://devcenter.heroku.com/articles/managing-buildpacks)
- [PHP-FPM設定のカスタマイズ](https://devcenter.heroku.com/articles/custom-php-settings)
- [Heroku Postgres](https://devcenter.heroku.com/articles/heroku-postgresql)
