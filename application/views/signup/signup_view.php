<?php
	$table = array(
			'table_open' => '<table border="0" cellpadding="4" cellspacing="0">',
			'table_close' => '</table>'
			);
	$input = array(
			array('',''),
			array('Username',form_input(array('name'=>'username','id'=>'username','size'=>'20','placeholder'=>'Username','class'=>'form-control'))),
			array('Password',form_password(array('name'=>'password','id'=>'password','size'=>'20','placeholder'=>'Password','class'=>'form-control'))),
			array('Confirm Password',form_password(array('name'=>'conf_pass','id'=>'conf_pass','size'=>'20','placeholder'=>'Confirm Password','class'=>'form-control'))),
			array('First Name',form_input(array('name'=>'firstname','id'=>'firstname','size'=>'20','placeholder'=>'First Name','class'=>'form-control'))),
			array('Middle Name',form_input(array('name'=>'middlename','id'=>'middlename','size'=>'20','placeholder'=>'Middle Name','class'=>'form-control'))),
			array('Last Name',form_input(array('name'=>'lastname','id'=>'lastname','size'=>'20','placeholder'=>'Last Name','class'=>'form-control'))),
			array('Birth Date',form_input(array('name'=>'birthdate','id'=>'birthdate','size'=>'20','placeholder'=>'Date of Birth','class'=>'form-control'))),
			array('E-Mail',form_input(array('name'=>'email','id'=>'email','size'=>'20','placeholder'=>'E-Mail Address','class'=>'form-input'))),
			array(form_button(array('name'=>'clear','content'=>'Clear','class'=>'btn btn-danger')),form_submit(array('name'=>'submit','value'=>'Register','class'=>'btn btn-success')))
			);
	$this->table->set_template($table);
	echo $this->table->generate($input);
?>