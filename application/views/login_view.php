<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Web Development</title>
		<link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="<?php echo base_url();?>datepicker/css/datepicker.css" rel="stylesheet">
		<link href="<?php echo base_url();?>includes/main-style.css" rel="stylesheet">

		<script src="http://code.jquery.com/jquery.js"></script><!-- script for jQuery Core -->
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script><!-- script for jQuery UI -->
		<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script> <!-- jQuery Form Validator -->
		<script src="<?php echo base_url();?>datepicker/js/bootstrap-datepicker.js"></script> <!--  jQuery datepicker -->

		<script>
			$(document).ready(function()
			{
				$('#register_id').hide();
				$('#birthdate').datepicker({
					format: 'yyyy-mm-dd'
				});
				
				//CLEAR FORM
				$('#clear').click(function(){
					$('form#register')[0].reset();
				});

				//REGISTER FORM AS DIALOG
				$('#create').click(function(){
					$('#register_id').dialog({
						width: 400,
						draggable: false,
						// modal: true,
						show: {
							effect: "blind",
							duration: 500
						},
						hide: {
							effect: "blind",
							duration: 500
						}
					});
				});

				// VALIDATE LOGIN
				$("form#login").validate({
	    		rules: {
	    			username: {
	    				required: true
	    			},
	    			password: {
	    				required: true
	    			}
	    		},
	    		messages: {
	    			username: {
	    				required: 'Username is required'
	    			},
	    			password: {
	    				required: 'Password is required'
	    			}
	    		},
	    		errorPlacement: function(error, element) {
         		   error.appendTo(element.parent("li").next("li"));
        		}
				});

				// VALIDATE CREATE ACCOUNT
				$("form#register").validate({
    			rules: {
    				username: {
    					required: true,
    					minlength: 5
    				},
    			    password: {
    			        required: true,
    			        minlength: 5
    			    },
   		 	    	conf_pass: {
    		    	    required: true,
    		    	    minlength: 5,
    		    	    equalTo: "#reg_pass"
    		    	},
    		    	firstname: {
    		    		required: true
    		    	},
    		    	lastname: {
    		    		required: true
    		    	},
    		    	birthdate: {
    		    		required: true,
    		    		date: true
    		    	},
    		    	email: {
    		    		required: true,
    		    		email: true
    		    	}
    			},
    			messages: {
    				username: {
    					required: "Username is required",
    					minlength: "Username must be atleast 5 characters long"
    				},
    			    password: {
    			        required: "Please provide a password",
    			        minlength: "Your password must be at least 7 characters long"
    			    },
    			    conf_pass: {
    			        required: "Please provide a password",
    		    	    minlength: "Your password must be at least 7 characters long",
    		        	equalTo: "Please enter the same password."
    	    		},
    	    		firstname: {
    	    			required: "First name is required"
    	    		},
    	    		lastname: {
    	    			required: "Last name is required"
    	    		},
    	    		birthdate: {
    	    			required: "Birthdate is required",
    	    			date: "Please enter a valid date"
    	    		},
    	    		email: {
    	    			required: 'E-Mail address is required'
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
			<?php echo form_open('login',array('id'=>'login'));?>
			<?php
				if($this->session->flashdata('result') != '')
				{
					echo $this->session->flashdata('result');
				}

				echo '<div class="login_field">
						<ul>
							<li>'.form_input(array('name'=>'username','id'=>'username','placeholder'=>'Enter Username','size'=>'20')).'</li>
							<li></li>
							<li>'.form_password(array('name'=>'password','id'=>'password','placeholder'=>'Enter Password','size'=>'20')).'</li>
							<li></li>
							<li>'.form_submit(array('name'=>'submit','id'=>'login_submit','value'=>'Login')).'</li>
							<li><div>
									<span>OR</span>
								</div></li>
							<li>'.form_button(array('name'=>'create','id'=>'create','content'=>'Register Account')).'</li>
						</ul>
					</div>';
			?>
			<?php echo form_close();?>
		</div>

		<div id="register_id" align="center">
			<h3>Register</h3>
			<?php echo validation_errors();?>
			<?php echo form_open('register', array('id'=>'register'));?>
			<?php
				$table = array(
					'table_open' => '<table border="0" cellpadding="4" cellspacing="0">',
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

