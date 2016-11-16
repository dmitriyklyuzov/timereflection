function deleteImg(listing_id, img){

	var clickResult = confirm("Are you sure you want to delete this image?");
	
	if(clickResult){
		$.ajax({
			url: "/app/controllers/listingController.php",
			type: "POST",
			data: "action=deleteImg&listing_id="+listing_id+"&img="+img,
			success: function(result){
				if (result=='1') {
					location.reload();
				}
				else alert ("Something went wrong and the image was not deleted Please try again.");
			}
		});
	}
}