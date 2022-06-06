<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[item_id])
	{
		$SQL="SELECT * FROM item WHERE item_id = $_REQUEST[item_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
<script>
jQuery(function() {
	jQuery( "#item_length" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-25:-10",
	   dateFormat: 'd MM,yy'
	});
});
</script>
<style>
ul.forms {
    float: left;
    list-style: none;
    padding: 0px 0px 10px 0px;
    width: 290px;
}
</style>

	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$heading?>Add Item</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/item.php" enctype="multipart/form-data" method="post" name="frm_item">
					<ul class="forms">
						<li class="txt">Name</li>
						<li class="inputfield"><input name="item_name" id="item_name" type="text" class="bar" required value="<?=$data[item_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt"> Type</li>
						<li class="inputfield">
							<select name="item_type_id" class="bar" required/>
								<?php echo get_new_optionlist("type","type_id","type_name",$data[item_type_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt"> Company</li>
						<li class="inputfield">
							<select name="item_company_id" class="bar" required/>
								<?php echo get_new_optionlist("company","company_id","company_name",$data[item_company_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt"> Price</li>
						<li class="inputfield"><input name="item_price" id="item_price" type="text" class="bar" required value="<?=$data[item_price]?>"/></li>
					</ul>
					
					<ul class="forms">
						<li class="txt">Item Address</li>
						<li class="inputfield"><input name="item_address" id="item_address" type="text" class="bar" required value="<?=$data[item_address]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Image</li>
						<li class="inputfield"><input name="item_image" type="file" class="bar"/></li>
					</ul>
					<div style="clear:both"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_item">
					<input type="hidden" name="avail_image" value="<?=$data[item_image]?>">
					<input type="hidden" name="item_id" value="<?=$data[item_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
