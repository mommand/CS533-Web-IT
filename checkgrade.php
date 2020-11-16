<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<?php
	include('asset.php');
	?>
	<title>
		Check Grade
	</title>
</head>
<body>
 <div class="container">
 	<?php
 		if (isset($_SESSION['msg'])) {
 			?>
 				<div class="alert alert-danger">
 					<p class="text-ceneter">
 						<?php
 						   echo $_SESSION['msg'];
 						?>
 					</p>
 				</div>
 			<?php
 		}
 	?>
 	<div class="row">
 		<form action="gradecontroller.php" method="get">
 			<div class="form-group">
 				<label>Select Your score</label><br>
 				<select class="form-control" name="score">
 					<option value="">select...</option>
 					<option value="50">50</option>
 					<option value="60">60</option>
 					<option value="70">70</option>
 					<option value="80">80</option>
 					<option value="90">90</option>
 					<option value="100">100</option>
 				</select>
 			</div>
 			<div class="form-group">
 				<input type="submit" class="btn btn-primary" value="Check Grade!">
 			</div>
 		</form>
 	</div>
 </div>
</body>
</html>