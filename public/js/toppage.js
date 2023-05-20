$(".openbtn").click(function () {//ボタンがクリックされたら
	$(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
    $("#container").toggleClass('mainblur');//ぼかしたいエリアにmainblurクラスを付与
});

$("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
    $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスを除去し
    $("#container").removeClass('mainblur');//ぼかしているエリアのmainblurクラスを除去
});


var table = document.querySelector('table');
var cells = table.getElementsByTagName('td');

for (var i = 0; i < cells.length; i++) {
  cells[i].addEventListener('mouseover', function() {
    this.parentNode.classList.add('hover');
  });
  cells[i].addEventListener('mouseout', function() {
    this.parentNode.classList.remove('hover');
  });
}

document.querySelector('.button-container a').addEventListener('click', function(e) {
  e.preventDefault();
  window.location.href = this.getAttribute('href');
});
















document.getElementById("open-popup-button").addEventListener("click", function() {
  document.getElementById("popup-overlay").style.display = "block";
});

document.getElementById("close-popup-button").addEventListener("click", function() {
  document.getElementById("popup-overlay").style.display = "none";
});

















window.addEventListener('load', function() {
    // postcodeJPのオブジェクトを作成
    var autoComplement = new postcodejp.address.AutoComplementService('0l2P7fKHKVVxe4em8W2g6NVK2L1nKvX5vpeQ2Rj');
    // 郵便番号のinputを設定
    autoComplement.setZipTextbox('zip');
    // 住所補完(都道府県)のinputを設定
    autoComplement.add(new postcodejp.address.StateTextbox('prefectures'));
    // 住所補完(市区町村)のinputを設定
    autoComplement.add(new postcodejp.address.TownTextbox('town'));
    // 住所補完(町域)のinputを設定
    autoComplement.add(new postcodejp.address.StreetTextbox('street'));
    // 郵便番号のinputの変更を監視
    autoComplement.observe();
});













// 経歴データの配列（仮のデータ）
const historyData = [
  { year: 2020, event: "イベント1" },
  { year: 2019, event: "イベント2" },
  { year: 2018, event: "イベント3" },
  // 他の経歴データを追加
];

// 経歴表を生成する関数
function generateHistoryTable() {
  const table = document.createElement("table");
  
  // ヘッダー行を作成
  const headerRow = document.createElement("tr");
  const yearHeader = document.createElement("th");
  yearHeader.textContent = "年月日";
  const eventHeader = document.createElement("th");
  eventHeader.textContent = "活動履歴";
  headerRow.appendChild(yearHeader);
  headerRow.appendChild(eventHeader);
  table.appendChild(headerRow);
  
  // 経歴データを行ごとに作成
  historyData.forEach(data => {
    const row = document.createElement("tr");
    const yearCell = document.createElement("td");
    yearCell.textContent = data.year;
    const eventCell = document.createElement("td");
    eventCell.textContent = data.event;
    row.appendChild(yearCell);
    row.appendChild(eventCell);
    table.appendChild(row);
  });
  
  // テーブルを表示する要素に追加
  const container = document.getElementById("history-table");
  container.appendChild(table);
}

// 経歴表を生成
generateHistoryTable();












const loginBtn = document.getElementById("login-btn");
const popupContainer = document.getElementById("popup-container");
const closeBtn = document.getElementById("close-btn");

loginBtn.addEventListener("click", () => {
  popupContainer.style.display = "block";
});

closeBtn.addEventListener("click", () => {
  popupContainer.style.display = "none";
});

window.addEventListener("click", (e) => {
  if (e.target === popupContainer) {
    popupContainer.style.display = "none";
  }
});








const toggle = document.getElementById("notification-toggle");
const statusText = document.getElementById("status-text");

toggle.addEventListener("change", function() {
  if (this.checked) {
    statusText.textContent = "オン";
    // 通知をオンにする処理を追加
  } else {
    statusText.textContent = "オフ";
    // 通知をオフにする処理を追加
  }
});







const toggleButton = document.getElementById("toggle-button");
const records = document.querySelectorAll(".record-result h3");

toggleButton.addEventListener("click", function() {
  records.forEach(function(record) {
    record.classList.toggle("hidden");
  });
});











//スクロールした際の動きを関数でまとめる
function PageTopAnime() {
    var scroll = $(window).scrollTop();
    if (scroll >= 200){//上から200pxスクロールしたら
      $('#page-top').removeClass('DownMove');//#page-topについているDownMoveというクラス名を除く
      $('#page-top').addClass('UpMove');//#page-topについているUpMoveというクラス名を付与
    }else{
      if($('#page-top').hasClass('UpMove')){//すでに#page-topにUpMoveというクラス名がついていたら
        $('#page-top').removeClass('UpMove');//UpMoveというクラス名を除き
        $('#page-top').addClass('DownMove');//DownMoveというクラス名を#page-topに付与
      }
    }
  }
  
  // 画面をスクロールをしたら動かしたい場合の記述
  $(window).scroll(function () {
    PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
  });
  
  // ページが読み込まれたらすぐに動かしたい場合の記述
  $(window).on('load', function () {
    PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
  });
  
  // #page-topをクリックした際の設定
  $('#page-top a').click(function () {
      $('body,html').animate({
          scrollTop: 0//ページトップまでスクロール
      }, 500);//ページトップスクロールの速さ。数字が大きいほど遅くなる
      return false;//リンク自体の無効化
  });