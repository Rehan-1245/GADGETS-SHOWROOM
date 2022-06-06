<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `booking`, `customer`, `item` WHERE customer_id = booking_customer_id AND item_id = booking_item_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_booking(booking_id)
{
	if(confirm("Do you want to delete the booking?"))
	{
		this.document.frm_booking.booking_id.value=booking_id;
		this.document.frm_booking.act.value="delete_booking";
		this.document.frm_booking.submit();
	}
}
jQuery(document).ready(function() {
	jQuery('#mydatatable').DataTable();
});
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Booking Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_booking" action="lib/booking.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Customer</td>
						<td scope="col">item</td>
						<td scope="col">Booking Amount</td>
						<td scope="col">Booking Date</td>
						<td scope="col">Delivery Date</td>
						<td scope="col">Booking Description</td>								
						<td scope="col">Action</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[booking_id]?></td>
						<td><?=$data[customer_name]?></td>
						<td><?=$data[item_name]?></td>
						<td><?=$data[booking_amount]?></td>
						<td><?=$data[booking_date]?></td>
						<td><?=$data[booking_delivery_date]?></td>
						<td><?=$data[booking_description]?></td>
						<td style="text-align:center">
							<a href="booking.php?booking_id=<?php echo $data[booking_id] ?>">Edit</a> | <a href="Javascript:delete_booking(<?=$data[booking_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="booking_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
