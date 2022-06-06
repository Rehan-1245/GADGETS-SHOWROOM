<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[customer_id])
	{
		$SQL="SELECT * FROM customer WHERE customer_id = $_REQUEST[customer_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
<script>
jQuery(function() {
	jQuery( "#customer_dob" ).datepicker({
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
				<h4 class="heading colr"><?=$heading?>Add Customer</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/customer.php" enctype="multipart/form-data" method="post" name="frm_customer">
					<ul class="forms">
						<li class="txt">Customer Name</li>
						<li class="inputfield"><input name="customer_name" id="customer_name" type="text" class="bar" required value="<?=$data[customer_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Gender</li>
						<li class="inputfield">
							<select name="customer_gender" class="bar" required/>
								<?php echo get_new_optionlist("gender","gender_id","gender_title",$data[customer_gender]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="customer_email" id="customer_email" type="text" class="bar" required value="<?=$data[customer_email]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Phone Number</li>
						<li class="inputfield"><input name="customer_phone" id="customer_phone" type="text" class="bar" required value="<?=$data[customer_phone]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Date of Birth</li>
						<li class="inputfield"><input name="customer_dob" id="customer_dob" type="text" class="bar" required value="<?=$data[customer_dob]?>"/></li>
					</ul>
                    <ul class="forms">
						<li class="txt">City</li>
						<li class="inputfield">
							<select name="customer_city" class="bar" required/>
								<?php echo get_new_optionlist("city","city_id","city_name",$data[customer_city]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">State</li>
						<li class="inputfield">
							<select name="customer_state" class="bar" required/>
								<?php echo get_new_optionlist("state","state_id","state_name",$data[customer_state]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Customer Address</li>
						<li class="inputfield"><input name="customer_address" id="customer_address" type="text" class="bar" required value="<?=$data[customer_address]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Customer Pin Code</li>
						<li class="inputfield"><input name="customer_pincode" id="customer_pincode" type="text" class="bar" required value="<?=$data[customer_pincode]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="customer_image" type="file" class="bar"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_customer">
					<input type="hidden" name="avail_image" value="<?=$data[customer_image]?>">
					<input type="hidden" name="customer_id" value="<?=$data[customer_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
