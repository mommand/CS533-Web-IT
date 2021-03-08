<?php
include('db_connect.php');
include('asset.php');
mysqli_select_db($conn, 'news');
$id = $_GET['id'];
$fetch_rec = "SELECT * FROM news WHERE id = $id";
 if ($rq = mysqli_query($conn, $fetch_rec)) {
 	
 	$rec = mysqli_fetch_assoc($rq);

 }
?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<div class="page-header">
					<h4 class="text-center">
						Edit your news!
					</h4>
				</div>
				<a href="shownews.php" class="btn btn-primary pull-right">Show News</a>
			</div>
			<form action="UpdatenewsController.php" method="post">
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
						<input type="text" name="title" class="form-control" value="<?php echo $rec['title']; ?>">
					</div>
				</div>
				<div class="row form-group">
						<div class="col-md-6">
						<label>Publish Date:</label>
						<input type="date" name="p_date" class="form-control" value="<?php echo $rec['p_date']; ?>">
						
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
						
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-10">
						<label>Body</label>
						<textarea class="form-control" name="body" rows="10">
							<?php echo $rec['body']; ?>"
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