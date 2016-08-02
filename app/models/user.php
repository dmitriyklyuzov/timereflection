<?
	class User {

		// private $firstName = '';
		private $email = '';
		private $password = '';
		private $regDate = '';
		private $lastLogin = '';
		private $loginAttempts ='';
		private $lastIp = '';

		function setName($n){
			$_SESSION['name']=$n;
		}

		function getName(){
			if(isset($_SESSION['name']) && !empty($_SESSION['name']) && $_SESSION['name'] != ''){
				return $_SESSION['name'];
			}
			else return 'Not set or empty';
		}

		function setEmail($e){
			$_SESSION['email']=$e;
		}

		function getEmail(){
			if(isset($_SESSION['email']) && !empty($_SESSION['email']) && $_SESSION['email'] != ''){
				return $_SESSION['email'];
			}
			else return 'Not set or empty';
		}

		function findEmail($e){
			$conn = DB();
			$result = $conn -> query("SELECT * FROM user WHERE user_email='" . $e . "';");
			$conn->close();
			return $result;
		}

		function setRegDate(){
			$conn = DB();
			$conn -> query ("UPDATE user SET user_regdate = NOW() WHERE user_email='".$this -> getEmail()."';");
			$conn -> close();
		}

		function updateLastLogin(){
			$conn = DB();
			$conn -> query ("UPDATE user SET user_last_login = NOW() WHERE user_email='".$this -> getEmail()."';");
			$conn -> close();
		}

		function getLoginAttempts(){
			$conn = DB();
			$result = $conn -> query("SELECT user_login_attempts FROM user WHERE user_email='".$this -> getEmail()."';");
			$conn -> close();
			if($row = $result -> fetch_assoc()){
				return $row['user_login_attempts'];
			}
		}

		function incrementLoginAttempts(){
			$conn = DB();
			$conn -> query("UPDATE user SET user_login_attempts = user_login_attempts + 1 WHERE user_email='".$this -> getEmail()."';");
			$conn -> close();
		}

		function zeroLoginAttempts(){
			$conn = DB();
			$conn -> query ("UPDATE user SET user_login_attempts = 0 WHERE user_email='".$this -> getEmail()."';");
			$conn -> close();
		}

		function setLoggedIn(){
			$_SESSION['logged_in']=true;
		}

		function isLoggedIn(){
			if(isset($_SESSION['logged_in'])){
				if($_SESSION['logged_in']){
					return true;
				}
				else return false;
			}
			else return false;
		}

		function create($n, $e, $p){

			$conn = DB();

			$stmt = $conn->prepare("INSERT INTO user (user_f_name, user_email, user_password)
														VALUES (?, ?, ?)");
								
			$stmt->bind_param("sss", $f_name, $email, $password);

			$f_name = $n;
			$email = $e;
			$password = $p;
			
			$stmt->execute();
			$stmt->close();
			$conn -> close();
		}

	}
?>