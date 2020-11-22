<!DOCTYPE html>
<html>
<head>
	<title>DB Form</title>
	<?php
		include('asset.php');
		include('db_connect.php');
		session_start();
	?>
</head>
<body>
  <div class="container">
  	<div class="row">
  		<?php
  		  if (isset($_SESSION['msg'])) {
  		  	?>
  		  		<div class="col-md-5">
  		  			 <div class="alert alert-danger">
  		  			 	<p class="text-center">
  		  			 		<?php
  		  			 		  echo $_SESSION['msg'];
  		  			 		  unset($_SESSION['msg']);
  		  			 		?>
  		  			 	</p>
  		  			 </div>
  				</div>
  		  	<?php
  		  }
  		  if (isset($_SESSION['success_mgs'])) {
  		  	?>
  		  		<div class="col-md-5">
  		  			<div class="alert alert-success">
  		  				<p class="text-center">
  		  					<?php
  		  					  echo $_SESSION['success_mgs'];
  		  					  unset($_SESSION['success_mgs']);
  		  					?>
  		  				</p>
  		  			</div>
  		  		</div>
  		  	<?php
  		  	# code...
  		  }
  		?>
  		<form action="db_controller.php" method="post">
  		<div class="form-group">
  			<label>Database Name:</label><br>
  			<input type="text" class="form-control" name="dbname">
  		</div>
  		<div class="form-group">
  			<input type="submit" value="Create!" class="btn btn-primary">
  		</div>
  	</form>
  	</div>

<div class="row">
  		<h4 align="center">List of Databases</h4><br>
  		<div class="row">
  		 <?php
  		 	$query = "SHOW DATABASES";
  		 	$run_query = mysqli_query($conn,$query);
  		 	if ($run_query->num_rows > 0) {
  		 		?>
  		 		<table class="table table-bordered">
  		 			<tr>
  		 				<th>ID</th>
  		 				<th>Database Name</th>
  		 				<th colspan="2">More Actions</th>
  		 			</tr>
  		 		<?php
  		 		while ($rows = $run_query->fetch_assoc()) {
  		 			 $i++;
  		 			 ?>
  		 			 	<tr>
  		 			 		<td><?php echo $i; ?></td>
  		 			 		<td><?php echo $rows['Database']; ?></td>
  		 			 		<td>
  		 			 			<a href="" class="btn btn-primary">
  		 			 				Show Tables
  		 			 			</a>
  		 			 		</td>
  		 			 		<td>
  		 			 			<a href="" class="btn btn-danger">
  		 			 				Drop Database
  		 			 			</a>
  		 			 		</td>
  		 			 	</tr>
  		 			 <?php
  		 		}
  		 		?>
  		 		</table>
  		 		<?php
  		 	}
  		 ?>
  		</div>
  	</div>

  </div>

</body>
</html>