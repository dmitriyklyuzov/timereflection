<?php

	function currencyToNumber($c){

		// replace whitespaces
		$c = str_replace(' ', '', $c);
		// replace dollar sign
		$c = str_replace('$', '', $c);
		// replace commas
		$c = str_replace(',', '', $c);

		if(strpos($c, '.')){
			$c = substr($c, 0, strpos($c, '.'));
		}
		return $c;

	}

	class Listing {

		private $listing_id = '';
		private $new_used = '';
		private $reference = '';
		private $condition = '';
		private $SKU = '';
		private $cost = '';
		private $price = '';
		private $notes = '';
		private $availability = '';
		private $email = '';
		private $listing_img_1 = '';

		function generateListingId(){
			$this -> listing_id = uniqid(uniqid());
		}

		function getListingId(){
			return $this -> listing_id;
		}

		function setNewUsed($n){
			$this -> new_used = $n;
		}

		function getNewUsed(){
			return $this -> new_used;
		}

		function setListingReference($r){
			$this -> reference = $r;
		}

		function getListingReference(){
			return $this -> reference;
		}

		function setCondition($c){
			$this -> condition = $c;
		}

		function getCondition(){
			return $this -> condition;
		}

		function setSKU($s){
			$this -> SKU = $s;
		}

		function getSKU(){
			return $this -> SKU;
		}

		function setCost($c){
			$this -> cost = currencyToNumber($c);
		}

		function getCost(){
			return $this -> cost;
		}

		function setPrice($p){
			$this -> price = currencyToNumber($p);
		}

		function getPrice(){
			return $this -> price;
		}

		function setNotes($n){
			$this -> notes = $n;
		}

		function getNotes(){
			return $this -> notes;
		}

		function setAvailability($a){
			$this -> availability = $a;
		}

		function getAvailability(){
			return $this -> availability;
		}

		function createListing($email){
			$conn = DB();
			$stmt = $conn->prepare("INSERT INTO listing (user_email, watch_reference, listing_condition,
														listing_notes, listing_sku, listing_available,
														listing_price, listing_new_used, listing_our_cost, 
														listing_id, listing_created)
									VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");		
			$stmt->bind_param("ssssssssss", $email, $this -> reference, $this -> condition,
											$this -> notes, $this -> SKU, $this -> availability, 
											$this -> price, $this -> new_used, $this -> cost, $this -> listing_id);
			
			$stmt -> execute();
			$stmt -> close();
			$conn -> close();
		}

		function setListingImg($img){
			$this -> listing_img_1 = $img;
		}

		function getListingImg(){
			return $this -> listing_img_1;
		}

		function updateListingImg(){
			$conn = DB();
			$conn -> query("UPDATE listing SET listing_img_1 = '" . $this -> listing_img_1 . "' WHERE listing_id = '" . $this -> listing_id . "';");
			$conn -> close();
		}
		
		function getListingByReference($id){
			$conn = DB();
			$result = $conn -> query("SELECT * FROM listing WHERE listing_id = '" . $id . "';");
			$conn -> close();

			while($row = $result -> fetch_assoc()){
				$this -> SKU = $row['listing_SKU'];
				$this -> listing_id = $row['listing_id'];
				$this -> new_used = $row['listing_new_used'];
				$this -> reference = $row['watch_reference'];
				$this -> condition = $row['listing_condition'];
				$this -> cost = $row['listing_our_cost'];
				$this -> price = $row['listing_price'];
				$this -> notes = $row['listing_notes'];
				$this -> availability = $row['listing_available'];
				$this -> email = $row['user_email'];
				$this -> created = $row['listing_created'];
			}
		}

	}

?>