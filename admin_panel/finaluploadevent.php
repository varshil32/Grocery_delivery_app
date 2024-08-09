<?php
//$target_dir="../uploadcategory/";
$target_dir="img/upload/events/";
chmod($target_dir,0777);
//echo 
$count = count($_FILES["fileToUploadEvent"]["name"]);
//exit();
$filearray = [];
$messageErr = [];
for ($i=0; $i < $count ; $i++)
{ 
$target_file=$target_dir . time(). basename($_FILES["fileToUploadEvent"]["name"][$i]);
$uploadok=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//check if image file is a actual image or fake image
if(isset($_POST["submit"]))
{
	if($_FILES["fileToUploadEvent"]["name"][$i]=="")
	{
		echo "No File is Selected.";
		exit();
	}
	$check=getimagesize($_FILES["fileToUploadEvent"]["tmp_name"][$i]);
	if($check!==false)
	{
		echo "File is an image - " . $check["mime"] . ".";
		$uploadok=1;
	}
	else
	{
		$messageErr[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: ". $_FILES["fileToUploadPlant"]["name"][$i]." File is not an image.";
		echo "File is not an image.";
		$uploadok=1;
	}
} 

//check if file already exist
if (file_exists($target_file)) 
{
	$messageErr[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: ". $_FILES["fileToUploadPlant"]["name"][$i]. " Sorry, File is already exists.";
	echo "Sorry, File is already exists.";
	$uploadok=0;
}

//check file size
if($_FILES["fileToUploadEvent"]["size"][$i]>500000)
{
	$messageErr[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: ". $_FILES["fileToUploadPlant"]["name"][$i]. " Sorry, File is too large.";
	echo "Sorry, File is too large.";
	$uploadok=0;

}
//allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
{
	$messageErr[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: ". $_FILES["fileToUploadPlant"]["name"][$i]. " Only JPG, JPEG, PNG & GIF files are allowed.";
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadok=0;
}

//check if $uploadok is set to 0 by an error
if($uploadok==0)
{
	echo "Sorry, your file was not uploaded.";
}//if everything is ok,try to upload file
else
{
	if(move_uploaded_file($_FILES["fileToUploadEvent"]["tmp_name"][$i], $target_file))
	{
		chmod($target_file,0777);
		echo "The file ". basename($_FILES["fileToUploadEvent"]["name"][$i]). " has been uploaded.";
		array_push($filearray, $target_file);
	}
	else
	{
		if (!$messageErr) {
			return $messageErr;
		}
	}
}
}
?>