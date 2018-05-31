var lastScrollTop = $(window).scrollTop();;
$(window).scroll(
	function () {
		var currentScrollTop = $(this).scrollTop();
		if (currentScrollTop > lastScrollTop + 50) {
			alert("scroll dowm");
		}else if (currentScrollTop < lastScrollTop - 50) {
			alert("scroll up")
		}
		lastScrollTop = currentScrollTop;
	}
)
