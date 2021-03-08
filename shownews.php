<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<div class="container">
	<div class="row">
		 <div class="page-header">
		 	 <h4 class="text-center">Published News</h4>
		 </div>

	</div>
	<div class="row">
		<?php
		  session_start();
			if (isset($_SESSION['msg'])) {
				?>
					<p class="alert alert-success">
						<?php
						 echo $_SESSION['msg'];
						 unset($_SESSION['msg']); 
						?>
					</p>
				<?php
			}
		?>
		 <?php
		include('db_connect.php');
		include('asset.php');
		mysqli_select_db($conn, 'news');
		// fetech records from news table 
		$query = "SELECT * FROM news ORDER BY id DESC";
		// EXECUTE query
		$rq = mysqli_query($conn, $query);

		if (mysqli_num_rows($rq) < 0) {
			 	echo "No Records Exist";
		 }
		else{
		?>
		 <table class="table table-borderd">
		 	<tr>
		 		<th>ID</th>
		 		<th>Title</th>
		 		<th>Category</th>
		 		<th>Date</th>
		 		<th colspan="3">More Action</th>
		 	</tr>
		<?php
			while ($rows = mysqli_fetch_assoc($rq)) {
				$i++;
				?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $rows['title'];?></td>
						<td><?php echo $rows['category']?></td>
						<td><?php echo $rows['p_date'];?></td>
						<td><a href="edit.php?id=<?php echo $rows['id'];?>" class="btn btn-warning">Edit</a></td>
						<td><a href="" class="btn btn-primary">Details</a></td>
						<td>
							<a href="deleteNews.php?id=<?php echo $rows['id'];?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this record?');">
							Delete
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
</body>
</html>
