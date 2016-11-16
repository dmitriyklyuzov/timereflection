function register(){

	var name = document.getElementById("f_name").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;

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
				$('#myModal').modal({backdrop:true});
			}
			else{
				document.getElementById("errorText").innerHTML = xmlhttp.responseText;
				document.getElementById("errorDiv").style.display = "block";
				document.getElementById("email").value = "";
				document.getElementById("password").value = "";
				if(document.getElementById("f_name").value == ""){
					document.getElementById("f_name").focus();
				}
				else{
					document.getElementById("email").focus();
				}
			}
		}
	};

	xmlhttp.open("POST", "register", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("f_name="+name+"&email="+email+"&password="+password);
}
