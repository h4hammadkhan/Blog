<?php

	require('../includes/db.php');
	if(isset($_POST['upload'])){
		$fileName   = basename($_FILES["image"]["name"]);
		$fileTmp    = $_FILES["image"]["tmp_name"];
		$fileType   = $_FILES["image"]["type"];
		$fileSize   = $_FILES["image"]["size"];
		$fileExt    = substr($fileName, strrpos($fileName, ".") + 1);

		  // Specify the images upload path
		  $largeImageLoc = '../img/'.$fileName;
		  $thumbImageLoc = '../profile/'.$fileName;

		 // Check and validate file extension
		 if((!empty($_FILES["image"])) && ($_FILES["image"]["error"] == 0)){
			if($fileExt != "jpg" && $fileExt != "jpeg" && $fileExt != "png" && $fileExt != "gif"){
				$error = "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
			}
		}else{
			$error = "Select an image file to upload.";
		}

	

		 // If everything is ok, try to upload file
		 if(empty($error) && !empty($fileName)){
			if(move_uploaded_file($fileTmp, $largeImageLoc)){
				// File permission
				chmod($largeImageLoc, 0777);
				
				// Get dimensions of the original image
				list($width_org, $height_org) = getimagesize($largeImageLoc);
				
				// Get image coordinates
				$x = (int) $_POST['x'];
				$y = (int) $_POST['y'];
				$width = (int) $_POST['w'];
				$height = (int) $_POST['h'];
	
				// Define the size of the cropped image
				$width_new = $width;
				$height_new = $height;
				
				// Create new true color image
				$newImage = imagecreatetruecolor($width_new, $height_new);
				
				
				// Create new image from file
				switch($fileType) {
					case "image/gif":
						$source = imagecreatefromgif($largeImageLoc); 
						break;
					case "image/pjpeg":
					case "image/jpeg":
					case "image/jpg":
						$source = imagecreatefromjpeg($largeImageLoc); 
						break;
					case "image/png":
					case "image/x-png":
						$source = imagecreatefrompng($largeImageLoc); 
						break;
				}
				
				// Copy and resize part of the image
				imagecopyresampled($newImage, $source, 0, 0, $x, $y, $width_new, $height_new, $width, $height);
				
				// Output image to file
				switch($fileType) {
					case "image/gif":
						imagegif($newImage, $thumbImageLoc); 
						break;
					case "image/pjpeg":
					case "image/jpeg":
					case "image/jpg":
						imagejpeg($newImage, $thumbImageLoc, 90); 
						break;
					case "image/png":
					case "image/x-png":
						imagepng($newImage, $thumbImageLoc);  
						break;
				}
				
				// Destroy image
				imagedestroy($newImage);
				unlink( $largeImageLoc);
	
				// Display cropped image
				// echo 'CROPPED IMAGE:<br/><img src="'.$thumbImageLoc.'"/>';
				$sql = "UPDATE admin SET profile='$fileName' WHERE id=1";
				$result = mysqli_query($conn, $sql);
				header('location:profile.php');
			}else{
				$error = "Sorry, there was an error uploading your file.";
			}
		}
	}
	
	// Display error

	



?>