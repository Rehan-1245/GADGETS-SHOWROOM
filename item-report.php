<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `item`, `type`, `company` WHERE type_id = item_type_id AND company_id = item_company_id";
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
			<h4 class="heading colr">Item Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_item" action="lib/item.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Image</td>
						<td scope="col"> Name</td>
						<td scope="col"> Type</td>
						<td scope="col">Company</td>
						<td scope="col"> Price</td>
						<td scope="col">Description</td>								
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
						<td><?=$data[item_id]?></td>
						<td>
						<a href="item-details.php?item_id=<?php echo $data[item_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[item_image]?>" style="heigh:50px; width:50px"></a></td>
						<td><?=$data[item_name]?></td>
						<td><?=$data[type_name]?></td>
						<td><?=$data[company_name]?></td>
						<td><?=$data[item_price]?></td>
						<td><?=$data[item_description]?></td>
						<td style="text-align:center">
							<a href="item.php?item_id=<?php echo $data[item_id] ?>">Edit</a> | <a href="Javascript:delete_item(<?=$data[item_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="item_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
