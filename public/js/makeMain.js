function makeMainImg(listing_id, img){
	// alert("listing id: "+listing_id+", img: "+img);

	$.ajax({
		url: "/app/controllers/listingController.php",
		type: "POST",
		data: 'action=updateMainImg&listing_id='+listing_id+'&img='+img,
		success: function(result){
			if(result=='true'){
				// alert('Main image updated.');
				$('.makeMainBtn').css("background-color", "#27ae60");
				$('.makeMainBtn').css("border-color", "#27ae60");
				$('.makeMainBtn').css("color", "#fff");

				setTimeout(
					function(){
						$('.makeMainBtn').css("background-color", "#31b0d5");
						$('.makeMainBtn').css("border-color", "#46b8da");
						$('.makeMainBtn').css("color", "#fff");
					}, 1000
				)
			}
		}
	})
}