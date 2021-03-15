<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<?php
	 session_start(); 
	 include('asset.php'); 
	?>
</head>
<body>
<div class="container">
	<div class="row">
		 <div class="col-md-4 col-md-offset-4">
		 	 <div class="row">
		 	 	<div class="page-header">
		 	 		<h4 class="text-center">
		 	 			 Registration Form
		 	 		</h4>
		 	 	</div>
		 	 </div>
		 	 <div class="row">
		 	 	<?php
		 	 		if (isset($_SESSION['error'])) {
		 	 			?>
		 	 			<div class="alert alert-danger">
		 	 			<?php
		 	 			foreach ($_SESSION['error'] as $err) {
		 	 				?>
		 	 					<p><?php echo $err; ?></p>
		 	 				<?php
		 	 			}
		 	 			?>
		 	 			</div>
		 	 			<?php
		 	 			unset($_SESSION['error']);
		 	 		}
		 	 	?>
		 	 </div>
		 	 <div class="row">
		 	 	<form action="regController.php" method="post">
		 	 		<div class="row form-group">
		 	 			<label>Full Name</label>
		 	 			<input type="text" name="fname" class="form-control">
		 	 		</div>
		 	 		<div class="row form-group">
		 	 			<label>Email</label>
		 	 			<input type="email" name="uname" class="form-control">
		 	 		</div>
		 	 		<div class="row form-group">
		 	 			<label>Password</label>
		 	 			<input type="password" name="password" class="form-control">
		 	 		</div>
		 	 		<div class="row form-group">
		 	 			<label>Re-Type Password</label>
		 	 			<input type="password" name="rpassword" class="form-control">
		 	 		</div>
		 	 		<div class="row form-group">
		 	 			<input type="submit" class="btn btn-primary" value="Register!" name="user_reg">
		 	 		</div>
		 	 	</form>
		 	 </div>
		 </div>
	</div>
</div>
</body>
</html>