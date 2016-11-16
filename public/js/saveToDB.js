function saveToDB(id, field, value){

	// alert('id='+id+', field='+field+', value='+value);

	// replaces linebreak when modifying notes
	if(value=='<br>'){
		value='';
	}

	// replaces new/pre-owned with 1 and 2
	if(value=='New' || value=='new' || value=='unworn' || value=='Unworn'){
		value = '1';
	}
	if(value=='Used' || value=='Pre-owned' || value=='used'){
		value = '2';
	}

	value = encodeURIComponent(value);

	$.ajax({
		url: "/app/controllers/listingController.php",
		type: "POST",
		data: 'action=update&id='+id+'&field='+field+'&value='+value,
		success: function(result){
			if(result=='true'){
				$('#'+field).css("background", "#2ecc71");
				$('#'+field).css("color", "#FFF");

				setTimeout(
					function(){

						$('#'+field).css("background", "#FFF");
						$('#'+field).css("color", "#000");

					}, 1000
				)
			}
			else{
				// alert('No success this time :(');
				$('#'+field).css("background", "#e74c3c");
				$('#'+field).css("color", "#FFF");

				setTimeout(
					function(){

						$('#'+field).css("background", "#FFF");
						$('#'+field).css("color", "#000");

					}, 1000
				)
			}
		}
	});
}