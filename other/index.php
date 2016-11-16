<?php
	
	// set the directory to scan
	$dir = '/Applications/MAMP/htdocs';
	// declare and initialize a string variable to hold the list of projects
	$list = '<a href="http://localhost:8888/phpMyAdmin/index.php?db=&table=&server=1&target=&token=08343349dee781f02edf810fd3c50ed3#PMAURL-0:index.php?db=&table=&server=1&target=&token=cfa359ca44ef4bcd07922f585261a260"><h2 class="text-center">PHP MyAdmin</h2></a>';

	try{
		// declare and initialize an array and scan a list of folders into it
		$folders=scandir($dir);

		// for each folder found
		foreach ($folders as $folder) {
			// if a folder found is a directory and if it doesn't begin with a dot (.)
			if(is_dir($folder) && $folder[0]!='.'){
				//append a link to the index.php file within that directory
				$list.='<a href="'.$folder.'/"><h2 class="text-center">'.$folder.'</h2></a>';
			}
		}
		// send a view
		include 'index.view.php';
	}
	//catch errors
	catch(E_WARNING $e){
		echo 'Caught exception: '.$e->getMessage().'. <br>';
	}

?>