<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `company`, `city`, `state` WHERE company_state = state_id AND company_city = city_id";
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
			<h4 class="heading colr">Company Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_company" action="lib/company.php" method="post">
				<div class="static">
				<table class="table table-striped table-advance table-hover"  id="mydatatable" style="color:#000000">
					<thead>
						<tr class="tablehead bold">
						<td scope="col">ID</td>
						<td scope="col">Image</td>
						<td scope="col">Company Name</td>
						<td scope="col">Email</td>
						<td scope="col">Company Phone</td>
						<td scope="col">Company City</td>
						<td scope="col">Company State</td>								
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
						<td><?=$data[company_id]?></td>
						<td>
						<a href="company-details.php?company_id=<?php echo $data[company_id] ?>"><img src="<?=$SERVER_PATH.'uploads/'.$data[company_image]?>" style="heigh:50px; width:50px"></a></td>
						<td><?=$data[company_name]?></td>
						<td><?=$data[company_email]?></td>
						<td><?=$data[company_phone]?></td>
						<td><?=$data[city_name]?></td>
						<td><?=$data[state_name]?></td>
						<td style="text-align:center">
							<a href="company.php?company_id=<?php echo $data[company_id] ?>">Edit</a> | <a href="Javascript:delete_company(<?=$data[company_id]?>)">Delete</a> 
						</td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="company_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
