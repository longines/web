<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Web Development</title>

		<!-- CSS/STYLES -->
		<link href="<?php echo base_url();?>includes/main-style.css" rel="stylesheet">
		<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url();?>datepicker/css/datepicker.css" rel="stylesheet">
		
		<!-- JQUERY/JAVASCRIPTS -->
		<script src="http://code.jquery.com/jquery.js"></script><!-- script for jQuery Core -->
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script><!-- script for jQuery UI -->
		<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script> <!-- jQuery Form Validator -->
	</head>
	<body>
		<?php
			echo "Welcome Home!";
			$session_data = $this->session->userdata('logged_in');
			var_dump($session_data);
			echo anchor('logout','Logout');
		?>
	</body>
</html>
