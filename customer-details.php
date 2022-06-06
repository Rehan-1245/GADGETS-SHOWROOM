<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[customer_id])
	{
		$SQL="SELECT * FROM customer, gender, city, state WHERE customer_gender = gender_id AND customer_city = city_id AND customer_state = state_id AND customer_id = $_REQUEST[customer_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 

	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$data[customer_name]?> Customer Details</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div id="myrow">
					
				<table>
		
						<tr>
							<th>Customer Name</th>
							<td><?=$data[customer_name]?></td>
						</tr>
						<tr>
							<th>Customer Gender</th>
							<td><?=$data[gender_title]?></td>
						</tr>
						<tr>
							<th>Id Number</th>
							<td><?=$data[customer_id_number]?></td>
						</tr>
						<tr>
							<th>Date of Birth</th>
							<td><?=$data[customer_dob]?></td>
						</tr>
						<tr>
							<th>Customer Email</th>
							<td><?=$data[customer_email]?></td>
						</tr>
						<tr>
							<th>Phone</th>
							<td><?=$data[customer_phone]?></td>
						</tr>
						<tr>
							<th>City</th>
							<td><?=$data[city_name]?></td>
						</tr>
					   <tr>
							<th>State</th>
							<td><?=$data[state_name]?></td>
						</tr>
						 <tr>
							<th>Address</th>
							<td><?=$data[customer_address]?></td>
						</tr>
						 <tr>
							<th>Pincode</th>
							<td><?=$data[customer_pincode]?></td>
						</tr>
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">Customer <?=$data['customer_name']?></h4>
			<div><img src="<?=$SERVER_PATH.'uploads/'.$data[customer_image]?>" style="width: 250px"></div><br>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
