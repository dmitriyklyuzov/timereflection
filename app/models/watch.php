<?
	class Watch{

		private $watch_reference = '';
		private $watch_id = '';
		private $watch_brand = '';
		private $watch_model = '';
		private $watch_material = '';
		private $watch_case_size = '';

		static function exists($id){

			$conn = DB();
			$result = $conn -> query("SELECT * FROM watch WHERE watch_id = '" . $id . "';");
			$conn -> close();

			if($row = $result -> fetch_assoc()){
				return true;
			}
			else return false;
		}

		static function refExists($r){

			$conn = DB();
			$result = $conn -> query("SELECT * FROM watch WHERE watch_reference = '" . $r . "';");
			$conn -> close();

			if($row = $result -> fetch_assoc()){
				return true;
			}
			else return false;
		}

		static function getBrandList(){
			$conn = DB();
			$result = $conn -> query("SELECT DISTINCT watch_brand FROM watch INNER JOIN listing on watch.watch_reference = listing.watch_reference;");
			$conn -> close();
			return $result;
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

		function setWatchReference($r){
			$this -> watch_reference = $r;
		}

		function getWatchReference(){
			return $this -> watch_reference;
		}

		function setWatchCaseSize($c){
			$this -> watch_case_size = removeMM($c);
		}

		function getWatchCaseSize(){
			return $this -> watch_case_size;
		}

		function createWatch($email){
			$conn = DB();
			
			$stmt = $conn->prepare("INSERT INTO watch (watch_reference, watch_brand,
														watch_model, watch_material,
														watch_id, user_email,
														watch_case_size, watch_created)
									VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");		
			
			$stmt->bind_param("sssssss",	$this -> watch_reference, $this -> watch_brand,
											$this -> watch_model, $this -> watch_material,
											$this -> watch_id, $email,
											$this -> watch_case_size);
			
			$stmt -> execute();
			$stmt -> close();
			$conn -> close();
		}

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
				$this -> watch_case_size = $row['watch_case_size'];
			}
		}
	}

	function removeMM($c){

		//remove m
		$c = str_replace('m', '', $c);

		//remove M
		$c = str_replace('M', '', $c);

		return $c;
	}

?>