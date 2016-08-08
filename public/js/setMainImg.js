function setMainImg(img){
	var imgName = img;
	$('#mainImg').attr('src', 'public/img/watches/' + imgName);
	$('#imageRow').height($('#mainImg').width());
}