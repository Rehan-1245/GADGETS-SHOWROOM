<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[booking_id])
	{
		$SQL="SELECT * FROM booking, item, customer WHERE customer_id = booking_customer_id AND item_id = booking_item_id AND booking_id = $_REQUEST[booking_id]";
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
				<h4 class="heading colr"><?=$data[booking]?> Booking Details</h4>
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
							<th>Customer</th>
							<td><?=$data[customer_name]?></td>
						</tr>
						<tr>
							<th>item</th>
							<td><?=$data[item_name]?></td>
						</tr>
						<tr>
							<th>Booking Amount</th>
							<td><?=$data[booking_amount]?></td>
						</tr>
						<tr>
							<th>Date</th>
							<td><?=$data[booking_date]?></td>
						</tr>
						<tr>
							<th>Delivery Date</th>
							<td><?=$data[booking_delivery_date]?></td>
						</tr>
						<tr>
							<th>Description</th>
							<td><?=$data[booking_description]?></td>
						</tr>
					
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">Booking <?=$data['booking_id']?></h4>
			<div><img src="<?=$SERVER_PATH.'uploads/'.$data[booking_image]?>" style="width: 250px"></div><br>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
