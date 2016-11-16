function login(){

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
			if(xmlhttp.responseText=='1'){
				window.location.replace("/");
				// alert('responseText is 1!');
			}
			else{
				document.getElementById("errorText").innerHTML = xmlhttp.responseText;
				document.getElementById("errorDiv").style.display = "block";
				document.getElementById("email").value = "";
				document.getElementById("password").value = "";
				document.getElementById("email").focus();
				// alert('responseText is something else!');
			}
		}
	};

	xmlhttp.open("POST", "login", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("email="+email+"&password="+password);
}
