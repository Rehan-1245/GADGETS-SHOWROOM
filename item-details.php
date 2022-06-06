<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[item_id])
	{
		$SQL="SELECT * FROM item, type, company WHERE type_id = item_type_id AND company_id = item_company_id AND item_id = $_REQUEST[item_id]";
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
				<h4 class="heading colr"><?=$data[item_name]?> item Details</h4>
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
							<th> Name</th>
							<td><?=$data[item_name]?></td>
						</tr>
						<tr>
							<th> Type</th>
							<td><?=$data[type_name]?></td>
						</tr>
						<tr>
							<th>Company</th>
							<td><?=$data[company_name]?></td>
						</tr>
						<tr>
							<th> Price</th>
							<td><?=$data[item_price]?></td>
						</tr>
						
							<th> Description</th>
							<td><?=$data[item_description]?></td>
						</tr>
						
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">item <?=$data['item_name']?></h4>
			<div><img src="<?=$SERVER_PATH.'uploads/'.$data[item_image]?>" style="width: 250px"></div><br>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
