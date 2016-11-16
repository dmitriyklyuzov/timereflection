function saveToDB(id, field, value){
	$.ajax({
		url: "/app/controllers/testController.php",
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