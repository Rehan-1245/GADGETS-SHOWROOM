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
			<h4 class="heading colr">Customer Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_customer" action="lib/customer.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Customer Name</td>
						<td scope="col">Customer Phone</td>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[customer_id]?></td>
						<td>
						<a href="customer-details.php?customer_id=<?php echo $data[customer_id] ?>"src="<?=$SERVER_PATH.'uploads/'.$data[customer_name]?>" style="heigh:50px; width:50px"></a></td>
						<td><?=$data[customer_name]?></td>
						<td><?=$data[customer_phone]?></td>
						<td style="text-align:center">
							<a href="customer.php?customer_id=<?php echo $data[customer_id] ?>">Edit</a> | <a href="Javascript:delete_customer(<?=$data[customer_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="customer_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
