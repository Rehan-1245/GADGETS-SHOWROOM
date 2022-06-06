<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_showroom.php"); 
	$SQL="SELECT * FROM item, type, company WHERE type_id = item_type_id AND company_id = item_company_id";
	if($_REQUEST[company_id])
	{
		$SQL="SELECT * FROM item, type, company WHERE type_id = item_type_id AND company_id = item_company_id AND item_company_id = $_REQUEST[company_id]";
	}
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?> 
<script>
function delete_item(item_id)
{
	if(confirm("Do you want to delete the item?"))
	{
		this.document.frm_item.item_id.value=item_id;
		this.document.frm_item.act.value="delete_item";
		this.document.frm_item.submit();
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
			<h4 class="heading colr">ALL ITEMs</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_item" action="lib/item.php" method="post">
				<div class="static">
					<table style="width:100%">
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<tr>
						<td><a href="item-details.php?item_id=<?php echo $data[item_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[item_image]?>" style="height:170px; width:150px"></a></td>
						<td style="vertical-align:top">
							<table border="0">
								<tr>
									<td class="tdheading">Name</th>
									<td><?=$data[item_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Type</th>
									<td><?=$data[type_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Company</th>
									<td><?=$data[company_name]?></td>
								</tr>
								<tr>
									<td class="tdheading"> Price</th>
									<td><?=$data[item_price]?></td>
								</tr>
								<tr>
									<td class="tdheading"> Description</th>
									<td><?=$data[item_description]?></td>
								</tr>
								
								<tr>
									<td colspan="2" style="text-align:center; padding:12px;">
										<a href="item-details.php?item_id=<?php echo $data[item_id] ?>" class="button-link">View Details</a>
										<?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
											<a href="booking-listing.php?item_id=<?php echo $data[item_id] ?>" class="button-link">View Booking</a>
										<?php } ?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php } ?>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="item_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
