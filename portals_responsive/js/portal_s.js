(function($){
	// smooth scroll スムーススクロールしたくないページ内リンクの親要素にはクラスno_scrollを指定する
	$('a[href^="#"]').not('.no_scroll a[href^="#"]').click(function() {
		var speed = 400;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$('body,html').animate({scrollTop:position}, speed, 'swing');
		return false;
	});

	// レスポンシブ画像切り替え
	var $elem = $('.responsive_img');
	var sp = '_sp.';
	var pc = '_pc.';
	var replaceWidth = 782;
	function imageSwitch() {
		var windowWidth = parseInt($(window).width());
		$elem.each(function() {
			var $this = $(this);
			if(windowWidth >= replaceWidth) {
				$this.attr('src', $this.attr('src').replace(sp, pc));
			} else {
				$this.attr('src', $this.attr('src').replace(pc, sp));
			}
		});
	}
	imageSwitch();
	var resizeTimer;
	$(window).on('resize', function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
			imageSwitch();
		},0);
	});
	//ナビゲーションの固定
	if($(window).width()){
		var box    = $("nav");
		var boxTop = box.offset().top;
		var navHeight    = $("nav").height();
		$(window).scroll(function () {
			if($(window).scrollTop() >= boxTop) {
				box.addClass("fixed");
				$("body").css("margin-top",navHeight);
			} else {
				box.removeClass("fixed");
				$("body").css("margin-top","0px");
			}
		});
	};
	//ページ上部へ戻るボタン
	const returnTop = document.querySelector('#bt_pagetop');
	window.addEventListener('scroll', () => {
		let scrollY = window.scrollY;
		if(scrollY >= 200) {
			returnTop.classList.add('active');
		}
		else {
			returnTop.classList.remove('active');
		}
	});
})(jQuery);
