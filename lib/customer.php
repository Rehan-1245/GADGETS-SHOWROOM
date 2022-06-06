<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_customer")
	{
		save_customer();
		exit;
	}
	if($_REQUEST[act]=="delete_customer")
	{
		delete_customer();
		exit;
	}
	
	###Code for save customer#####
	function save_customer()
	{
		global $con;
		$R=$_REQUEST;		
		/////////////////////////////////////
		$image_name = $_FILES[customer_image][name];
		$location = $_FILES[customer_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}				
		if($R[customer_id])
		{
			$statement = "UPDATE `customer` SET";
			$cond = "WHERE `customer_id` = '$R[customer_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `customer` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`customer_name` = '$R[customer_name]',
				`customer_gender` = '$R[customer_gender]', 
				`customer_email` = '$R[customer_email]',
				`customer_phone` = '$R[customer_phone]', 
				`customer_image` = '$image_name',
				`customer_pincode` = '$R[customer_pincode]', 
				`customer_address` = '$R[customer_address]',
				`customer_dob` = '$R[customer_dob]', 
				`customer_city` = '$R[customer_city]', 
				`customer_state` = '$R[customer_state]'".
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../customer-report.php?msg=$msg");
	}
#########Function for delete customer##########3
function delete_customer()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM customer WHERE customer_id = $_REQUEST[customer_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../customer-report.php?msg=Deleted Successfully.");
}
?>
