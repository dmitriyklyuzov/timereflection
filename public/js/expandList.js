function expandList(brandName, brandNameGlyph){
	$('.'+brandName).toggle();
	// $('#'+brandName+'_glyphicon').toggleClass('glyphicon-triangle-bottom glyphicon-triangle-right');
	$('#'+brandNameGlyph).toggleClass('glyphicon-triangle-bottom glyphicon-triangle-right');
	// $('#ROLEX_glyphicon').toggleClass('glyphicon-triangle-bottom glyphicon-triangle-right');
	// $('#'+brandName+'_glyphicon').removeClass('glyphicon-triangle-bottom').addClass('glyphicon-triangle-right');
	// $('.'+brandName+'_glyphicon').addClass('glyphicon-triangle-right');
}