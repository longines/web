<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<title>Web Development</title>
	</head>

	<body>
		<div id="login" align="center" class="form-group has-success">
			<form action="login.php" method="POST">
				<h2>Login</h2>
				<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td><input type="text" name="username" size="20" class="form-control" placeholder="Username"></td>
					</tr>
					<tr>
						<td><input type="password" name="password" size="20" class="form-control" placeholder="Password"></td>
					</tr>
					<tr>
						<?php
							// echo base_url().'<br>';
							// echo site_url().'<br>';
							// echo APPPATH.'<br>';
							// echo SELF.'<br>';
							// echo BASEPATH.'<br>';
						?>
						<td align="center"><a href="<?php echo base_url();?>main/signup" class="btn btn-info btn-sm">Sign-up</a>
						<input type="submit" class="btn btn-success btn-sm" value="Login"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>