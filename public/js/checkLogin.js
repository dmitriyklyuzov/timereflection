function checkLogin(){

	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;

	// ref = '123';
	
	// if(email == "" || password == ""){
	// 	document.getElementById("errorDiv").innerHTML = "Nothing entered";
	// 	return;
	// }
	// else{
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
					window.location.replace("/timereflection");
					// alert('responseText is 1!');
				}
				else{
					document.getElementById("errorDiv").innerHTML = xmlhttp.responseText;
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
	// }
}
