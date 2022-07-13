$(function(){
	// var offset = 1000;
	var duration = 300;
	// $(window).on("scroll", function () {
	// 	if ($(window).scrollTop() > offset) {
	// 		$('#fsrepublic-tools').fadeIn(duration);
	// 	} else {
	// 		$('#fsrepublic-tools').fadeOut(duration);
	// 	}
	// });

	$('.back-to-top').click(function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, duration);
		return false;
	});

	$("#fsrepublic-tools-dropdown").on("click", function() {
		$("#fsrepublic-tools-item-list").toggle(50);
		$("i", this).toggleClass("fa-caret-up fa-caret-down");
		$("#fb-root > div.fb_dialog").toggleClass("messenger-icon-move");
	});
});