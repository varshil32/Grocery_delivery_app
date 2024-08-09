<?php 
require('./dbconnection.php');
var_dump($_POST);


if(isset($_POST['category_id']))
{
	$cid=$_POST['category_id'];
	$qry="SELECT * FROM subcategory_table WHERE category_id=$cid AND active=1";
	$rs=mysqli_query($conn,$qry);

	if(mysqli_num_rows($rs)>0)
	{
		echo "<option value=''>Select Subcategory</option>";
		while ($row=mysqli_fetch_assoc($rs)) {
			# code...
			echo "<option value=".$row['id'].">".$row['subcategory_name']."</option>";
		}
	}
	else
	{
		echo "<option value='' selected>Select Subcategory</option>";
	}
}


// if(isset($_POST['city_id']))
// {
// 	$cid=$_POST['city_id'];
// 	$qry1="SELECT * FROM area_table WHERE city_id=$cid";
// 	$rs1=mysqli_query($conn,$qry1);

// 	if(mysqli_num_rows($rs1)>0)
// 	{
// 		echo "<option>Select Area</option>";
// 		while($row=mysqli_fetch_assoc($rs1))
// 		{
// 			echo "<option value=".$row['id'].">".$row['area_name']."</option>";
// 		}
// 	}
// }