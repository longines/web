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
			// GET SESSION AND OTHER VARIABLES OF HEADER
			$session_data = $this->session->userdata('logged_in');
			$name = $session_data['firstname'].' '.$session_data['middlename'].' '.$session_data['lastname'];
			$logout = anchor('logout','Logout',array('id'=>'logout'));
			$search = '<div class="search_div">
						<input type="text" size="50" placeholder="Search..."/>
						<input type="submit" class="search" value="Search" name="submit"></input>
						</div>';

			// ARRAY LINKS
			$links = array();
			array_push($links, "Welcome Home!");
			array_push($links,$search);
			array_push($links, $name);
			array_push($links, $logout);
			//ARRAY TO ARRAY
			$x = array();
			array_push($x, $links);

			//NAVIGATION
			echo '<nav>
			<ul>';
				foreach($x as $key => $value)
				{
					foreach($value as $links)
					{
						echo '<li>'.$links.'</li>';
					}
				}
			echo '</ul>
			</nav>';
		?>
	</body>
</html>
