var lastScrollTop = $(window).scrollTop();
$(window).scroll(
	function () {
		var currentScrollTop = $(this).scrollTop();
		if (lastScrollTop < 95) {
			$('header').show();		
		}

		if (currentScrollTop > lastScrollTop + 10) {		
			$('header').hide();
		}else if (currentScrollTop < lastScrollTop - 50) {	
			$('header').show();
		}
		lastScrollTop = currentScrollTop;
	}
)
