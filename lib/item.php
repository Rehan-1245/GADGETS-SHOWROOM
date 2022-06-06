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
					`item_name` = '$R[item_name]', 
					`item_type_id` = '$R[item_type_id]', 
					`item_company_id` = '$R[item_company_id]', 
					`item_price` = '$R[item_price]', 
					`item_image` = '$image_name',
					`item_description` = '$R[item_description]', 
					`item_number` = '$R[item_number]', 
					`item_length` = '$R[item_length]', 
					`item_width` = '$R[item_width]', 
					`item_height` = '$R[item_height]',  
					`item_fuel_type` = '$R[item_fuel_type]',
					`item_displacement` = '$R[item_displacement]',
					`item_max_power` = '$R[item_max_power]', 
					`item_max_torque` = '$R[item_max_torque]',
					`item_milage` = '$R[item_milage]',
					`item_transmission_type` = '$R[item_transmission_type]',
					`item_front_tyre` = '$R[item_front_tyre]',
					`item_rear_tyre` = '$R[item_rear_tyre]'".
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
