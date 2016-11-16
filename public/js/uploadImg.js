function uploadImg(){

	$('#filename').text($('#fileToUpload').val());
	var file_data = $('#fileToUpload').prop('files')[0];
	var form_data = new FormData();
	form_data.append('fileToUpload', file_data);
	// alert(form_data);
	$.ajax({
		url: 'test',
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: 'post',
		success: function(php_script_response){

			var str = php_script_response;
			// alert(str);
			if(str.indexOf("Sorry") >= 0){
				alert(php_script_response);
			}
			else{
				// $('#img-1').attr('src', 'public/img/watches/'.concat(php_script_response));	
				$('#clickBtn').toggleClass('btn-info btn-success');
				alert('Success!');
			}
		}
	})
}
