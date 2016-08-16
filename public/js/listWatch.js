function listWatch(){

	var brand = $('#brand-input').val();
	var model = $('#model-input').val();
	var ref = $('#ref-input').val();
	var sku = $('#sku-input').val();
	var material = $('#material-input').val();
	var dial = $('#dial-input').val();
	var condition = $('#condition-input').val();
	var cost = $('#cost-input').val();
	var retail = $('#retail-input').val();
	var price = $('#price-input').val();
	var notes = $('#notes-input').val();
	var new_used = $('input[name=new_used]:checked').val();
	var box = $('input[name=box]:checked').val();
	var papers = $('input[name=papers]:checked').val();
	var availability = $('input[name=availability]:checked').val();

	// alert('Brand: ' + brand + '; model: ' +model + '; Ref: ' + ref + '; sku: ' + sku + '; material: ' + material + '; Dial: ' + dial);

	// alert('condition: ' + condition + '; cost: ' + cost + '; retail: ' + retail + '; price: ' + price + '; notes: ' +notes );

	// alert(new_used);
	// alert(box);
	// alert(papers);
	// alert(avaiable);

	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			if(xmlhttp.responseText == '1'){
				// alert('Listed!');
				$('#panel2').addClass('fadeOutLeftBig').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					// $('#panel1').css('margin-top', '-'+panel1Height+'px');
					$('#panel2').css('display', 'none');
					$('#panel3').css('display', 'block');
					$('#panel3').addClass('fadeInRightBig');
					$('#panel2').removeClass('zoomOut');
				});
			}
			else{
				alert(xmlhttp.responseText);
				// document.getElementById("errorText").innerHTML = xmlhttp.responseText;
			}
		}
	};

	xmlhttp.open("POST", "add", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// xmlhttp.send("f_name="+name+"&email="+email+"&password="+password);
	xmlhttp.send("ref="+ref+
				"&brand="+brand+
				"&model="+model+
				"&material="+material+
				"&retail="+retail+
				"&dial="+dial+
				"&new_used="+new_used+
				"&condition="+condition+
				"&sku="+sku+
				"&cost="+cost+
				"&price="+price+
				"&notes="+notes+
				"&availability="+availability+
				"&box="+box+
				"&papers"+papers);
}
