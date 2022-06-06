<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `company`, `city`, `state` WHERE company_city = city_id AND company_state = state_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_company(company_id)
{
	if(confirm("Do you want to delete the company?"))
	{
		this.document.frm_company.company_id.value=company_id;
		this.document.frm_company.act.value="delete_company";
		this.document.frm_company.submit();
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
			<h4 class="heading colr">All Companies</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_company" action="lib/company.php" method="post">
				<div class="static">
					<table>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<tr>
						<td><a href="company-details.php?company_id=<?php echo $data[company_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[company_image]?>" style="height:170px; width:150px"></a></td>
						<td style="vertical-align:top">
							<table border="0">
								<tr>
									<td class="tdheading">Name</th>
									<td><?=$data[company_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Phone</th>
									<td><?=$data[company_phone]?></td>
								</tr>
								<tr>
									<td class="tdheading">City</th>
									<td><?=$data[city_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">State</th>
									<td><?=$data[state_name]?></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center; padding:12px;">
										<a href="company-details.php?company_id=<?php echo $data[company_id] ?>" class="button-link">View Details</a>
										<a href="item-listing.php?company_id=<?php echo $data[company_id] ?>" class="button-link">view Item</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php } ?>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="company_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
