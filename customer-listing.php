<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `customer`, `gender`, `city` WHERE customer_gender = gender_id AND customer_city = city_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_customer(customer_id)
{
	if(confirm("Do you want to delete the customer?"))
	{
		this.document.frm_customer.customer_id.value=customer_id;
		this.document.frm_customer.act.value="delete_customer";
		this.document.frm_customer.submit();
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
			<h4 class="heading colr">All Customers</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_customer" action="lib/customer.php" method="post">
				<div class="static">
					<table>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<tr>
						<td><a href="customer-details.php?customer_id=<?php echo $data[customer_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[customer_image]?>" style="height:170px; width:150px"></a></td>
						<td style="vertical-align:top">
							<table border="0">
								<tr>
									<td class="tdheading">Name</th>
									<td><?=$data[customer_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Gender</th>
									<td><?=$data[gender_title]?></td>
								</tr>
								<tr>
									<td class="tdheading">Phone</th>
									<td><?=$data[customer_phone]?></td>
								</tr>
								<tr>
									<td class="tdheading">City</th>
									<td><?=$data[city_name]?></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center; padding:12px;">
										<a href="customer-details.php?customer_id=<?php echo $data[customer_id] ?>" class="button-link">View Details</a>
										<a href="booking-listing.php?customer_id=<?php echo $data[customer_id] ?>" class="button-link">View Booking</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php } ?>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="customer_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
