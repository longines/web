<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Web Development</title>
		<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="<?php echo base_url();?>datepicker/css/datepicker.css" rel="stylesheet">

		<script src="http://code.jquery.com/jquery.js"></script><!-- script for jQuery Core -->
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script><!-- script for jQuery UI -->
		<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script> <!-- jQuery Form Validator -->
		<script src="<?php echo base_url();?>datepicker/js/bootstrap-datepicker.js"></script> <!--  jQuery datepicker -->

		<script>
			$(document).ready(function()
			{
				$('#register_id').hide();
				$('#birthdate').datepicker({format: 'yyyy-mm-dd'});
				
				//CLEAR FORM
				$('#clear').click(function(){
					$('form#register')[0].reset();
				});

				$('#signup').click(function(){
					$('#register_id').slideToggle('fast',function() {});
				});

				// validate signup form on keyup and submit
				$("form#register_id").validate({
    			rules: {
    			    reg_pass: {
    			        required: true,
    			        minlength: 5
    			    },
   		 	    	conf_pass: {
    		    	    required: true,
    		    	    minlength: 5,
    		    	    equalTo: "#reg_pass"
    		    	},
    		    	email: {
    		    		required: true,
    		    		email: true
    		    	}
    			},
    			messages: {
    			    reg_pass: {
    			        required: "Please provide a password",
    			        minlength: "Your password must be at least 7 characters long"
    			    },
    			    conf_pass: {
    			        required: "Please provide a password",
    		    	    minlength: "Your password must be at least 7 characters long",
    		        	equalTo: "Please enter the same password."
    	    		}
    			}
			});
		});
		</script>
	</head>

	<body>
		<div id="login_id" align="center" class="form-group has-success">
			<h2>Login</h2>
			<?php echo validation_errors();?>
			<?php echo form_open('login');?>
			<?php
				if($this->session->flashdata('result') != '')
				{
					echo $this->session->flashdata('result');
				}

				$table = array(
					'table_open' => '<table border="1" cellpadding="4" cellspacing="0">',
					'table_close' => '</table>'
				);

				$input = array(
						array('',''),
						array('Username',form_input(array('name'=>'username','id'=>'username','size'=>'20','class'=>'form-control'))),
						array('Password',form_password(array('name'=>'password','id'=>'password','size'=>'20','class'=>'form-control'))),
						array(form_button(array('name'=>'signup','id'=>'signup','content'=>'Sign-up','class'=>'btn btn-sm btn-info')),
							form_submit(array('name'=>'submit','id'=>'submit','value'=>'Login','class'=>'btn btn-sm btn-success')))
							);
				$this->table->set_template($table);
				echo $this->table->generate($input);
			?>
			<?php echo form_close();?>
		</div>

		<div id="register_id" align="center">
			<h3>Register</h3>
			<?php echo validation_errors();?>
			<?php echo form_open('register', array('id'=>'register'));?>
			<?php
				$table = array(
					'table_open' => '<table border="0" cellpadding="4" cellspacing="5">',
					'table_close' => '</table>'
				);
				$input = array(
					array('',''),
					array('Username',form_input(array('name'=>'username','id'=>'username','size'=>'20','placeholder'=>'Username','class'=>'form-control'))),
					array('Password',form_password(array('name'=>'password','id'=>'reg_pass','size'=>'20','placeholder'=>'Password','class'=>'form-control'))),
					array('Confirm Password',form_password(array('name'=>'conf_pass','id'=>'conf_pass','size'=>'20','placeholder'=>'Confirm Password','class'=>'form-control'))),
					array('First Name',form_input(array('name'=>'firstname','id'=>'firstname','size'=>'20','placeholder'=>'First Name','class'=>'form-control'))),
					array('Middle Name',form_input(array('name'=>'middlename','id'=>'middlename','size'=>'20','placeholder'=>'Middle Name','class'=>'form-control'))),
					array('Last Name',form_input(array('name'=>'lastname','id'=>'lastname','size'=>'20','placeholder'=>'Last Name','class'=>'form-control'))),
					array('Birth Date',form_input(array('name'=>'birthdate','id'=>'birthdate','size'=>'20','placeholder'=>'Date of Birth','class'=>'form-control'))),
					array('E-Mail',form_input(array('name'=>'email','id'=>'email','size'=>'20','placeholder'=>'E-Mail Address','class'=>'form-control'))),
					array(form_button(array('name'=>'clear','id'=>'clear','content'=>'Clear','class'=>'btn btn-danger')),'<center>'.form_submit(array('name'=>'submit','value'=>'Register','class'=>'btn btn-success')))
					);
				$this->table->set_template($table);
				echo $this->table->generate($input);
			?>
			<?php echo form_close();?>
		</div>
	</body>
</html>

