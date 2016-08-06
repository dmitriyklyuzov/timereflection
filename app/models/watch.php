<?
	class Watch{

		private $watch_reference = '';
		private $watch_id = '';
		private $watch_brand = '';
		private $watch_model = '';
		private $watch_material = '';
		private $watch_retail = '';

		function getBrandList(){
			$conn = DB();
			$result = $conn -> query("SELECT DISTINCT watch_brand FROM watch;");
			$conn -> close();
			return $result;
		}

		function echoBrandList(){
			while($rows = getBrandList() -> fetch_assoc()){
				echo '<option value='.$rows['watch_brand'].'>'.$rows['watch_brand'].'</option>';
			}
		}

		function generateWatchId(){
			$this -> watch_id = uniqid(uniqid());
		}

		function getWatchId(){
			return $this -> watch_id;
		}

		function findWatch($r){
			$conn = DB();
			$result = $conn -> query("SELECT * FROM watch WHERE watch_reference ='" . $r . "';");
			$conn->close();
			return $result;
		}

		function setWatchBrand($b){
			$this -> watch_brand = $b;
		}

		function getWatchBrand(){
			return $this -> watch_brand;
		}

		function setWatchModel($m){
			$this -> watch_model = $m;
		}

		function getWatchModel(){
			return $this -> watch_model;
		}

		function setWatchMaterial($m){
			$this -> watch_material = $m;
		}

		function getWatchMaterial(){
			return $this -> watch_material;
		}

		function setWatchRetail($r){
			$this -> watch_retail =$r;
		}

		function getWatchRetail(){
			return $this -> watch_retail;
		}

		function setWatchReference($r){
			$this -> watch_reference = $r;
		}

		function getWatchReference(){
			return $this -> watch_reference;
		}

		function createWatch($email){
			$conn = DB();
			
			$stmt = $conn->prepare("INSERT INTO watch (watch_reference, watch_brand,
														watch_model, watch_material,
														watch_retail, watch_id,
														user_email, watch_created)
									VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");		
			
			$stmt->bind_param("sssssss",	$this -> watch_reference, $this -> watch_brand,
											$this -> watch_model, $this -> watch_material,
											$this -> watch_retail, $this -> watch_id,
											$email);
			
			$stmt -> execute();
			$stmt -> close();
			$conn -> close();
		}

		// function __construct(){

		// 	$this -> watch_reference = '';
		// 	$this -> watch_id = '';
		// 	$this -> watch_brand = '';
		// 	$this -> watch_model = '';
		// 	$this -> watch_material = '';
		// 	$this -> watch_retail = '';
		// }

		function getWatchByReference($ref){
			
			$conn = DB();
			$result = $conn -> query("SELECT * FROM watch WHERE watch_reference = '" . $ref . "';");
			$conn -> close();

			while($row = $result -> fetch_assoc()){
				$this -> watch_reference = $row['watch_reference'];
				$this -> watch_id = $row['watch_id'];
				$this -> watch_brand = $row['watch_brand'];
				$this -> watch_model = $row['watch_model'];
				$this -> watch_material = $row['watch_material'];
				$this -> watch_retail = $row['watch_retail'];
			}
		}
	}

?>