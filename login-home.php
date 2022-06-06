<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[item_id])
	{
		$SQL="SELECT * FROM item WHERE item_id = $_REQUEST[item_id]";
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
					<h4 class="heading colr">Welcome to Eletronics Showroom Management System</h4>
					<ul class='login-home-listing'>
							<li><a href="./index.php">Home</a></li>
							<li><a href="./about.php">About Us</a></li>
							<li><a href="./customer.php">Add Customer</a></li>
							<li><a href="./customer-report.php">Customer Report</a></li>
							<li><a href="./booking.php">Add Booking</a></li>
							<li><a href="./booking-report.php">Booking Report</a></li>
							<li><a href="./item.php">Add Item</a></li>
							<li><a href="./item-report.php">Item Report</a></li>
							<li><a href="./company.php">Add Company</a></li>
							<li><a href="./company-report.php">Company Report</a></li>
							<li><a href="./user.php?user_id=<?php echo $_SESSION['user_details']['user_id']; ?>">My Account</a></li>
							<li><a href="change-password.php">Change Password</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>
					</ul>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
