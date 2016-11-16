if(!file_exists($target_file)){
						// fileName - file name without the path
						$fileName = basename($_FILES['img']['name'][$i]);

						if(move_uploaded_file($_FILES['img']['tmp_name'][$i], $target_file)){

							$conn = DB();
							$conn -> query("INSERT INTO listing_img (listing_id, img_name, date_added) VALUES ('" . $newListingId . "', '" . $fileName . "', NOW());");
							$conn -> close();
							// echo 'File inserted';

							if(!Listing::hasMainImage($newListingId)){
								$conn = DB();
								$conn -> query("UPDATE listing_img SET main_img = 1 WHERE img_name = '" . $fileName . "';");
								$conn -> close();
							}

							header('Location: details/'. $newListingId);
						}
						else echo 'Sorry, something went wrong.';
					}
					else{
						echo 'Sorry, this file already exists!';
					}