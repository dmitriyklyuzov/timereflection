function replaceRadio(id){

	if(id=='listing_box' || id=='listing_papers'){
		var radio = 
		'<label class="radio-inline"><input type="radio" name="'+id+'" value="1"><span class="text-success">Yes</span></label><label class="radio-inline"><input type="radio" name="'+id+'" value="2"><span class="text-warning">No</span></label>';
	}

	if(id=="listing_available"){
		var radio = '<label class="radio-inline"><input type="radio" name="listing_available" value="1"><span class="text-success">Available</span></label><label class="radio-inline"><input type="radio" name="listing_available" value="2"><span class="text-warning">On hold</span></label><label class="radio-inline"><input type="radio" name="listing_available" value="3"><span class="text-danger">Sold</span></label>';
	}

	if($("#"+id).html() !== radio){
		$("#"+id).html(radio);
	}
	else{
		// alert($('input[name="'+id+'"]:checked').val());
		var value = $('input[name="'+id+'"]:checked').val();
		saveToDB('<?php echo $listing -> getListingId(); ?>', id, value);
		
		if(id=='listing_box' || id=='listing_papers'){
			var text = 'YES';
			if(value=='2'){
				text = 'NO';
			}
		}
		else{
			var text = 'Available';
			if(value=='2'){
				text = 'On hold';
			}
			if(value=='3'){
				text = 'Sold';
			}
		}

		$("#"+id).html(text);
	};
}