function checkWatch(){

	var ref = document.getElementById("ref").value;

	// ref = '123';
	
	if(ref == ""){
		document.getElementById("ref").focus();
		return;
	}
	else{
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if(xmlhttp.responseText!='0'){
					document.getElementById("content").innerHTML = xmlhttp.responseText;
					$('#foundWatchModal').modal({backdrop:true});
					// alert('response is not 0');
				}
				else{
					$('#panel1').addClass('fadeOutLeftBig').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
						// $('#panel1').css('margin-top', '-'+panel1Height+'px');
						$('#panel1').css('display', 'none');
						$('#panel2').css('display', 'block');
						$('#panel2').addClass('fadeInRightBig');
						$('#panel1').removeClass('zoomOut');
					});
					document.getElementById('ref-input').value = ref;
					document.getElementById('brand-input').focus();
				}
			}
		};
		xmlhttp.open("GET", "add/lookup/"+ref, true);
		xmlhttp.send();
	}
}
