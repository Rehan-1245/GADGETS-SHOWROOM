<?php
	ini_set("display_errors",0);
	error_reporting(0);
	session_start();
	include_once("db_connect.php");
	include_once("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Electronic Showroom Management System</title>
<!-- // Stylesheets // -->
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<link rel="stylesheet" type="text/css" href="./css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="./css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="./css/slider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css">

<!-- // Javascripts // -->
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="./js/validation.js"></script>
<script type="text/javascript" src="./js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="./js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="./js/anythingslider.js"></script>
<script type="text/javascript" src="./js/animatedcollapse.js"></script>
<script type="text/javascript" src="./js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="./js/menu.js"></script>
<script type="text/javascript" src="./js/contentslider.js"></script>
<script type="text/javascript" src="./js/ddaccordion.js"></script>
<script type="text/javascript" src="./js/acrodin.js"></script>
<script type="text/javascript" src="./js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="./js/lightbox.js"></script>
<script type="text/javascript" src="./js/menu-collapsed.js"></script>
<script type="text/javascript" src="./js/cufon-yui.js"></script>
<script type="text/javascript" src="./js/trebuchet_ms_400-trebuchet_ms_700-trebuchet_ms_italic_700-trebuchet_ms_italic_400.font.js"></script>
<script type="text/javascript" src="./js/cufon.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<link href='css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script src="js/jquery.dataTables.min.js"></script>
<meta charset='utf-8' />
</head>

<body>
<div id="wrapper_sec">
	<div id="masthead">
    	<div class="logo">
        	<a href="./index.php" class="logo-custom">Electronic Showroom Management System</a>
        </div>
		<?php if($_SESSION['login']) { ?> 
        <div class="slogan" style="color:#ffffff; font-weight:bold; font-size:14px;">Welcome <?=$_SESSION['user_details']['user_name']?></div>
		<?php } else { ?>
		<div class="slogan"></div>
		<?php } ?>
        <div class="clear"></div>
            <div class="navigation">
            	<div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./about.php">About Us</a></li>
                    <?php if($_SESSION['login'] != 1) {?>
					<?php } if($_SESSION['user_details']['user_level_id'] == 2) {?>
						<li><a href="./booking-report.php?user_id=<?=$_SESSION['user_details']['user_id']?>">My Bookings</a></li>
					<?php } if($_SESSION['login'] == 1) {?>
						<li><a href="./login-home.php">Dashboard</a></li>
						<li><a href="#">Administration</a>
							<ul>
								<li><a href="./customer.php">Add Customer</a></li>
								<li><a href="./booking.php">Add Booking</a></li>
								<li><a href="./item.php">Add Item</a></li>
								<li><a href="./company.php">Add Company</a></li>
							</ul>
						</li>
						<li><a href="#">Reports</a>
							<ul>
								<li><a href="./customer-report.php">Customer Report</a></li>
								<li><a href="./customer-listing.php">Customer Listing</a></li>
								<li><a href="./booking-report.php">Booking Report</a></li>
								<li><a href="./item-report.php">Item Report</a></li>
								<li><a href="./company-report.php">Company Report</a></li>
							</ul>
						</li>
						<li><a href="./user.php?user_id=<?php echo $_SESSION['user_details']['user_id']; ?>">My Account</a></li>
						<li><a href="change-password.php">Change Password</a></li>
						<li><a href="./lib/login.php?act=logout">Logout</a></li>
					<?php } else { ?>
						<li><a href="./item-listing.php">ALL ITEM </a></li>
						<li><a href="./company-listing.php">All Companies</a></li>
						<li><a href="./login.php">Login</a></li>
						<li><a href="./contact.php">Contact Us</a></li>
					<?php }?>
                    </ul>
                    <br style="clear: left" />
                    </div>
                    <ul class="searchsec" style="display:none">
						<li><input type="text" value="Search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search'; }" onfocus="if(this.value == 'Search') { this.value = ''; }" class="bar" /></li>
						<li><input type="image" src="./images/go.gif" alt="" class="go" /></li>
					</ul>
            </div>
    </div>
