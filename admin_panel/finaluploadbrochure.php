<?php
//$target_dir="../uploadcategory/";
$target_dir="img/upload/products/brochure/";
chmod($target_dir, 0777);
$target_file_pdf=$target_dir . time(). basename($_FILES["fileToUploadBrochure"]["name"]);
$uploadok=1;
$imageFileType=strtolower(pathinfo($target_file_pdf,PATHINFO_EXTENSION));

$messageErrBrochure = [];

//check if image file is a actual image or fake image
if(isset($_POST["submit"]))
{
	if($_FILES["fileToUploadBrochure"]["name"]=="")
	{
		echo "No File is Selected.";
		exit();
	}
    $file=$_FILES["fileToUploadBrochure"]["tmp_name"];

} 

//check if file already exist
if (file_exists($target_file_pdf)) 
{
	$messageErrBrochure[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: ". $_FILES["fileToUploadPlant"]["name"][$i]. " Sorry, File is already exists.";
	echo "Sorry, File is already exists.";
	$uploadok=0;
}


//check file size
if($_FILES["fileToUploadBrochure"]["size"]>100000000000)
{
	$messageErrBrochure[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: ". $_FILES["fileToUploadPlant"]["name"][$i]. " Sorry, File is too large.";
	echo "Sorry, File is too large.";
	$uploadok=0;

}
//allow certain file formats
if($imageFileType != "pdf")
{
	$messageErrBrochure[$_FILES["fileToUploadPlant"]["name"][$i]] = "File: ". $_FILES["fileToUploadPlant"]["name"][$i]. " Sorry, only pdf files are allowed.";
	echo "Sorry, only pdf files are allowed.";
	$uploadok=0;
}

//check if $uploadok is set to 0 by an error
if($uploadok==0)
{
	echo "Sorry, your file was not uploaded.";
}
else
{
	if(move_uploaded_file($_FILES["fileToUploadBrochure"]["tmp_name"], $target_file_pdf))
	{
		chmod($target_file_pdf, 0777);
		echo "The file ". basename($_FILES["fileToUploadBrochure"]["name"]). " has been uploaded.";
	}
	else
	{
		if (!$messageErrBrochure) {
			return $messageErrBrochure;
		}
	}
}
?>