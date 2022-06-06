<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[company_id])
	{
		$SQL="SELECT * FROM company WHERE company_id = $_REQUEST[company_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
<script>
jQuery(function() {
	jQuery( "#company_dob" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-25:-10",
	   dateFormat: 'd MM,yy'
	});
});
</script>

	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$heading?>Add Company</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/company.php" enctype="multipart/form-data" method="post" name="frm_company">
					<ul class="forms">
						<li class="txt">Company Name</li>
						<li class="inputfield"><input name="company_name" id="company_name" type="text" class="bar" required value="<?=$data[company_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="company_email" id="company_email" type="text" class="bar" required value="<?=$data[company_email]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Phone Number</li>
						<li class="inputfield"><input name="company_phone" id="company_phone" type="text" class="bar" required value="<?=$data[company_phone]?>"/></li>
					</ul>
                    <ul class="forms">
						<li class="txt">City</li>
						<li class="inputfield">
							<select name="company_city" class="bar" required/>
								<?php echo get_new_optionlist("city","city_id","city_name",$data[company_city]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">State</li>
						<li class="inputfield">
							<select name="company_state" class="bar" required/>
								<?php echo get_new_optionlist("state","state_id","state_name",$data[company_state]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Company Address</li>
						<li class="inputfield"><input name="company_address" id="company_address" type="text" class="bar" required value="<?=$data[company_address]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="company_image" type="file" class="bar"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_company">
					<input type="hidden" name="avail_image" value="<?=$data[company_image]?>">
					<input type="hidden" name="company_id" value="<?=$data[company_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
