<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[company_id])
	{
		$SQL="SELECT * FROM company, city, state WHERE company_city = city_id AND company_state = state_id AND company_id = $_REQUEST[company_id]";
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
				<h4 class="heading colr"><?=$data[company_name]?> Company Details</h4>
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
							<th>Company Name</th>
							<td><?=$data[company_name]?></td>
						</tr>
						<tr>
							<th>Company Email</th>
							<td><?=$data[company_email]?></td>
						</tr>
						<tr>
							<th>Phone</th>
							<td><?=$data[company_phone]?></td>
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
							<td><?=$data[company_address]?></td>
						</tr>
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">Company <?=$data['company_name']?></h4>
			<div><img src="<?=$SERVER_PATH.'uploads/'.$data[company_image]?>" style="width: 250px"></div><br>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
