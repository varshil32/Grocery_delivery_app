<?php
$target_dir = "img/upload/products/pic/";
chmod($target_dir, 0777);
$count = count($_FILES["fileToUploadProduct"]["name"]);
$filearray = [];
$messageErr = [];
for ($i = 0; $i < $count; $i++) {
	$target_file = $target_dir . time() . basename($_FILES["fileToUploadProduct"]["name"][$i]);
	$uploadok = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	//check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
		if ($_FILES["fileToUploadProduct"]["name"][$i] == "") {
			echo "No File is Selected.";
		}
		$check = getimagesize($_FILES["fileToUploadProduct"]["tmp_name"][$i]);
		if ($check !== false) {
			var_dump($check);
			echo "File is an image - " . $check["mime"] . ".";
			$uploadok = 1;
		} else {
			$messageErr[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: " . $_FILES["fileToUploadPlant"]["name"][$i] . " File is not an image.";
			echo "File is not an image.";
			$uploadok = 1;
		}
	}

	//check if file already exist
	if (file_exists($target_file)) {
		$messageErr[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: " . $_FILES["fileToUploadPlant"]["name"][$i] . " Sorry, File is already exists.";
		echo "Sorry, File is already exists.";
		$uploadok = 0;
	}

	//check file size
	if ($_FILES["fileToUploadProduct"]["size"][$i] > 100000000) {
		$messageErr[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: " . $_FILES["fileToUploadPlant"]["name"][$i] . " Only JPG, JPEG, PNG & GIF files are allowed.";
		echo "Sorry, File is too large.";
		$uploadok = 0;
	}
	//allow certain file formats
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadok = 0;
	}

	//check if $uploadok is set to 0 by an error
	if ($uploadok == 0) {
		echo "Sorry, your file was not uploaded.";
	} //if everything is ok,try to upload file
	else {
		if (move_uploaded_file($_FILES["fileToUploadProduct"]["tmp_name"][$i], $target_file)) {
			chmod($target_file, 0777);
			echo "The file " . basename($_FILES["fileToUploadProduct"]["name"][$i]) . " has been uploaded.";
			array_push($filearray, $target_file);
			if (copy($target_file, "D:/xampp setup/htdocs/ty_project/mobile_app/flutter_application_1/img/upload/products/pic/" . basename($_FILES["fileToUploadProduct"]["name"][$i]))) {
				echo "File has been copied to the new location.";
			} else {
				echo "Failed to copy file to the new location.";
			}
		} else {
			if (!$messageErr) {
				return $messageErr;
			}
		}
	}
}
