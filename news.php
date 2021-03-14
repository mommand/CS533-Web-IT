<!DOCTYPE html>
<html>
<head>
	<title>Upload News</title>
	<?php
		include('asset.php');
		include('db_connect.php');
		session_start();
	?>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<div class="page-header">
					<h4 class="text-center">
						Publish your news!
					</h4>
				</div>
				<a href="shownews.php" class="btn btn-primary pull-right">Show News</a>
			</div>
			<form action="newsController.php" method="post" enctype="multipart/form-data">
				<div class="row form-group">
					<?php
					if (isset($_SESSION['success'])) {
						?>
						 <div class="alert alert-success">
						 	 <p class="text-center">
						 	 	<?php echo $_SESSION['success']; ?>
						 	 </p>
						 </div>
						<?php
					}
					?>
					
					<div class="col-md-6">
						<label>Title</label>
						<input type="text" name="title" class="form-control">
						<?php
						 if (isset($_SESSION['error'])) {
						 	?>
						 	 <p class="text-danger">
						 	 	<?php 
						 	 	echo $_SESSION['error'];
						 	 	unset($_SESSION['error']); 
						 	 	?>
						 	 </p>
						 	<?php
						 }
						?>
					</div>
				</div>
				<div class="row form-group">
						<div class="col-md-6">
						<label>Publish Date:</label>
						<input type="date" name="p_date" class="form-control">
						<?php
					    	if ($_SESSION['error1']) {
					    	?>
					    		<p class="text-danger">
					    			<?php
					    				echo $_SESSION['error1'];
						 	 			unset($_SESSION['error1']);
					    			?>
					    		</p>
					    	<?php
					    	}
					    ?>
					    </div>
					    
					</div>
				<div class="row form-group">
					<div class="col-md-6">
						<label>Category</label>
						<select class="form-control" name="category">
							<option value="">.. please select..</option>
							<?php
								mysqli_select_db($conn, 'tech_news');
								$query = "SELECT * FROM categories";
								$run_query = mysqli_query($conn, $query);
								while ($cat = mysqli_fetch_assoc($run_query)) {
									?>
										<option value="<?php echo $cat['id']; ?>">
											<?php echo $cat['name'];?>
												
											</option>
									<?php
								}
							?>
							
						</select>
						<?php
						 if (isset($_SESSION['error1'])) {
						 	?>
						 	 <p class="text-danger">
						 	 	<?php 
						 	 	echo $_SESSION['error2'];
						 	 	unset($_SESSION['error2']); 
						 	 	?>
						 	 </p>
						 	<?php
						 }
						?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<label>Upload Image</label>
						<input type="file" name="image" class="form-control" id="image">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-10">
						<label>Body</label>
						<textarea class="form-control" name="body" rows="10">
						</textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						 <input type="submit" name="submit" value="Publish!" class="btn btn-primary">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>