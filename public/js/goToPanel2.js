function goToPanel2(){
	$('#panel1').addClass('fadeOutLeftBig').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		// $('#panel1').css('margin-top', '-'+panel1Height+'px');
		$('#panel1').css('display', 'none');
		$('#panel2').css('display', 'block');
		$('#panel2').addClass('fadeInRightBig');
		$('#panel1').removeClass('zoomOut');
	});
}