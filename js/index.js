//ボタン
const scroll_to_top_btn = document.querySelector('#js-pagetop');

//クリックイベントを追加
scroll_to_top_btn.addEventListener( 'click' , scroll_to_top );

function scroll_to_top(){
	window.scroll({top: 0, behavior: 'smooth'});
	console.log("hoge");
};
