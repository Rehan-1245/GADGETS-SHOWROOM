<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[booking_id])
	{
		$SQL="SELECT * FROM booking WHERE booking_id = $_REQUEST[booking_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
<script>
jQuery(function() {
	jQuery( "#booking_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-25:-10",
	   dateFormat: 'd MM,yy'
	});
});
</script>
<script>
jQuery(function() {
	jQuery( "#booking_delivery_date" ).datepicker({
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
				<h4 class="heading colr"><?=$heading?>Add Booking</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/booking.php" enctype="multipart/form-data" method="post" name="frm_booking">
					<ul class="forms">
						<li class="txt">Select Customer</li>
						<li class="inputfield">
							<select name="booking_customer_id" class="bar" required/>
								<?php echo get_new_optionlist("customer","customer_id","customer_name",$data[booking_customer_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Select Item</li>
						<li class="inputfield">
							<select name="booking_item_id" class="bar" required/>
								<?php echo get_new_optionlist("item","item_id","item_name",$data[booking_item_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Booking Amount</li>
						<li class="inputfield"><input name="booking_amount" id="booking_amount" type="text" class="bar" required value="<?=$data[booking_amount]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Booking Date</li>
						<li class="inputfield"><input name="booking_date" id="booking_date" type="text" class="bar" required value="<?=$data[booking_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Delivery Date</li>
						<li class="inputfield"><input name="booking_delivery_date" id="booking_delivery_date" type="text" class="bar" required value="<?=$data[booking_delivery_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Booking Description</li>
						<li class="textfield"><textarea name="booking_description" cols="" rows="4" required style="width:300px; height:70px"><?=$data[booking_description]?></textarea></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_booking">
					<input type="hidden" name="avail_image" value="<?=$data[booking_image]?>">
					<input type="hidden" name="booking_id" value="<?=$data[booking_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
