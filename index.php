<?php

# CSV Output

# Settings
$GLOBALS[csv_path] = "csv/";
$GLOBALS[author] = "oXiVanisher";

# Load saved svc file settings
require_once("inc/sources.inc.php");

# Load PHP functions
require_once("inc/functions.inc.php");

# Rendering of the HTML content begins here
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
	<head>
		<title>CSV Viewer</title>

		<link href="css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css" />
		<link href="css/bottombar.css" rel="stylesheet" media="all" type="text/css" />
		<link href="css/csvtable.css" rel="stylesheet" media="all" type="text/css" />

		<link rel="SHORTCUT ICON" href="images/favicon.ico" type="image/x-icon">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>

        <script src="js/bootstrap-alert.js"></script>
        <script src="js/bootstrap-alerts.js"></script>
        <script src="js/bootstrap-button.js"></script>
        <script src="js/bootstrap-buttons.js"></script>
        <script src="js/bootstrap-carousel.js"></script>
        <script src="js/bootstrap-collapse.js"></script>
        <script src="js/bootstrap-dropdown.js"></script>
        <script src="js/bootstrap-modal.js"></script>
        <script src="js/bootstrap-scrollspy.js"></script>
        <script src="js/bootstrap-tab.js"></script>
        <script src="js/bootstrap-tabs.js"></script>
        <script src="js/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap-transition.js"></script>
        <script src="js/bootstrap-twipsy.js"></script>
        <script src="js/bootstrap-typeahead.js"></script>
        <script src="js/bootstrap-popover.js"></script>

        <script src="js/csvviewer.js"></script>
	</head>
	<body style="padding-top: 40px;">
		<div class="navbar navbar-fixed-top" data-dropdown="dropdown">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="index.php">CSV Viewer</a>
					<ul class="nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Choose File</a>
							<ul class="dropdown-menu">
								<?php echo renderNav(); ?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<br />
		<div class="container">
		<div class="tabbable tabs-below">
			<div class="tab-content" id="content">
			<?php
				if ($_GET[file] == "") {
					echo "<ul>" . renderNav() . "</ul>";
				} else {
					echo renderTable($_GET[file]);
				}
			?>
			</div>
			<ul class="nav nav-tabs">
				<?php echo renderNav(); ?>
			</ul>
			</div>
		</div>
		<br />
		<div class="bottombar">
			<div class="fill">
				<div class="container">
					&copy; by <?php echo $GLOBALS[author]; ?>.
				</div>
			</div>
		</div>
	</body>
</head>
