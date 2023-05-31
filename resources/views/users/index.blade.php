<!DOCTYPE html>
<html lang="ja">
  <x-app-layout>
    <x-slot name="header">
        <meta charset="UTF-8">
        <meta name="description"
        content="～日々の健康情報を記録・スケジュール管理♪">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ secure_asset('/css/style.css') }}" rel="stylesheet" type="text/css">
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
    <script src="calendar/google-calendar/index.global.js"></script>
    
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
          events:'https://calendar.google.com/calendar/embed?src=daisuke.mtc%40gmail.com&ctz=Asia%2FTokyo',
          googleCalendarApiKey: 'AIzaSyDm13lj-LQY1GcMAj61DrccLKJvvGZaWP4'
        });
        calendar.render();
      });

    </script>
    
    
    <title>健康管理ヘルスケアApp</title>
    </x-slot>
    <body>
        
        <p id="page-top"><a href="#">Page Top</a></p>
        
        <header>
            <div id="site_title">
                <h1 id = "main_title">健康管理ヘルスケアApp</h1>
                <h1 id = "sub_title"><span id="sub_title_head">Let's get healthy together!!</span><span id="sub_title_body">日々の健康管理を記録しよう！</span>
                </h1>
                
                
                
                <div class="member_buttonarea">
                    <input type="member_registration" id="open-popup-button" value="会員登録">
                    <input type="login"   id="login-btn" value="ログイン">
                </div>
                
            </div>
            
        
        <div id="popup-overlay">
          @foreach ($posts as $post)
          @endforeach
          <div id="popup-content">
            
            <h2>会員登録</h2>
            <form>
              <!-- フォームの内容をここに追加 -->
              <input type="text" placeholder="名前" required>
                <br><input type="text" id="zip" placeholder="郵便番号">
                <br><input type="text" id="prefectures" placeholder="都道府県">
                <br><input type="text" id="town" placeholder="市区町村">
                <br><input type="text" id="street" placeholder="町域">
              <br><input type="email" placeholder="メールアドレス" required>
              <br><input type="password" placeholder="パスワード" required>
              <br><input type="submit" value="送信">
            </form>
            <button id="close-popup-button">閉じる</button>
          </div>
          
        </div>
        

        <div id="popup-container">
          <div id="popup-content">
            <h2>ログインフォーム</h2>
            <form id="login-form">
              <label for="username">ユーザー名:</label>
              <input type="text" id="username" name="username" required>
              <br>
              <label for="password">パスワード:</label>
              <input type="password" id="password" name="password" required>
              <br>
              <button type="submit">ログイン</button>
            </form>
            <span id="close-btn">&times;</span>
          </div>
        </div>
        
            
            
            <div class="openbtn"><span></span><span></span><span></span></div>
            <nav id="g-nav">
                <div id="g-nav-list">
                    <ul>
                        <li><a href="/">
                                                        TOP PAGE<br>トップページ</a></li>
                        <li><a href="/news/">
                                                        NEWS<br>ニュース</a></li>
                        <li><a href="../myfavorite2/index.html">
                                                        BLOG<br>ブログ</a></li>
                        <li><a href="../myfavorite3/index.html">
                                                        MEDICINE<br>市販薬</a></li>
                        <li><a href="../myfavorite4/index.html">
                                                        CLINIC SERCH<br>クリニック検索</a></li>
                        <li><a href="../top_page/acsess.html">
                                                        CONTACT<br>お問い合わせ</a></li>
        
                    </ul>
            
                </div>
            
            </nav>
            <div id="container">
            
            
            <header id ="header1">
        <nav>
            <ul class="gnav-navi-1">
                <li><a href="/">
                                                TOP PAGE<br>トップページ</a></li>
                <li><a href="/news">
                                                NEWS<br>ニュース</a></li>
                <li><a href="../myfavorite2/index.html">
                                                BLOG<br>ブログ</a></li>
                <li><a href="../myfavorite3/index.html">
                                                MEDICINE<br>市販薬</a></li>
                <li><a href="../myfavorite4/index.html">
                                                CLINIC SERCH<br>クリニック検索</a></li>
                <li><a href="../top_page/acsess.html">
                                                CONTACT<br>お問い合わせ</a></li>

                
            </ul>
        </nav>
    </header>
            
        </header>
         <div id="ww_e6d4aba9669dd" v='1.3' loc='id' a='{"t":"ticker","lang":"ja","sl_lpl":1,"ids":["wl6827"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"image","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#81D4FA","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722"}'>Weather for the Following Location: <a href="https://2ua.org/jpn/ota/map/" id="ww_e6d4aba9669dd_u" target="_blank">Ota map, Japan</a></div><script async src="https://app1.weatherwidget.org/js/?id=ww_e6d4aba9669dd"></script>
        
        
        <h1 id="new_title">★★最新情報★★</h1>
        
        
    <div class="news-container">
        <table>
            <thead>
              <tr>
                <th>日付</th>
                <th>お知らせ内容</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2023/05/11</td>
                <td><a href="https://example.com/news1">サイトリリースについて</a></td>
              </tr>
              <tr>
                <td>2023/05/09</td>
                <td><a href="https://example.com/news2">このサイトの使い方</a></td>
              </tr>
              <tr>
                <td>2023/05/05</td>
                <td><a href="https://example.com/news2">サイトの便利な機能</a></td>
              </tr>
            </tbody>
        </table>
        <div class="button-container">
            <a href="/news">もっと見る</a>
        </div>
    </div>

    
        <div class="recorsd_schedule_button">
                <input type="record" value="記録"/>
                <input type="schedule" value="予定の入力"/>
            </div>
    <div class="sidebar">
        <div class="sidebar-frame">
            <h1>サイドメニュー</h1>
            <h2>ようこそ！ <a href="#">{{ Auth::user()->name }}</a> さん</h2>
            
            
            <input type="button" id="mypage" value="マイページ"/>
            
            <ul>
              <li><h2>通知機能</h2>
            <div class="notification-container">
                <p id="notification-status">通知: <span id="status-text">オフ</span></p>
              <label for="notification-toggle" class="switch">
                <input type="checkbox" id="notification-toggle">
                <span class="slider round"></span>
              </label>
            </div>
              </li>
              <li>
                 <h2>最新の記録</h2>
                <div class="record-result">
                  <h3>身長: <span id="height">180 cm</span></h3>
                  <h3>体重: <span id="weight">70 kg</span></h3>
                  <h3>血圧: <span id="weight">120 / 80 mmHg</span></h3>
                  <!-- 追加の記録項目 -->
                  <!-- <h3>...</h3> -->
                </div>
                <button id="toggle-button">隠す</button>
              </li>
              
              <li>
                  <h2>個人のお知らせ</h2>
                  <div class="mynews-container">
                      <table>
                          <thead>
                              <tr>
                                  <th>日付</th>
                                  <th>お知らせ内容</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>2023/05/12</td>
                                  <td><a href="https://exa,ple.com/mynews1">今週の記録推移</a></td>
                              </tr>
                              <tr>
                                  <td>2023/05/11</td>
                                  <td><a href="https://exa,ple.com/mynews1">！高血圧の方に最適な食材！！</a></td>
                              </tr>
                              
                          </tbody>
                      </table>
                  </div>
              </li>
              
              <li><a href="#">リンク1</a></li>
              <li><a href="#">リンク2</a></li>
              <li><a href="#">リンク3</a></li>
              <!-- 他のメニューアイテムを追加 -->
            </ul>
            <div class="sidebar-content">
                </div>
              </div>
            </div>
            
            
        <div id="history-table"></div>
        
        <h1>2023年のカレンダー</h1>
    <div id='calendar'></div>
        
        
        
        
        
        
        
        
    </div>
    
        
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!--/container--></div>
        
        
        <script src="{{ secure_asset('/js/toppage.js') }}"></script>
        
        
        
    </body>
    </x-app-layout>
</html>