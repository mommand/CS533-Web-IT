<?php
include('db_connect.php');
$db = mysqli_select_db($conn, 'news');
$title = $_POST['title'];
$p_date	= $_POST['p_date'];
$category = $_POST['category'];
$body	= $_POST['body'];
if (empty($title)) {
	session_start();

	$_SESSION['error'] = "Please fill out this feild!";
	header('location:news.php');
}
if (empty($p_date)) {
	session_start();
	$_SESSION['error1'] = "The publish date filed is required!";
	header('location:news.php');
}
if (empty($category)) {
	session_start();
	$_SESSION['error2'] = "Please select at least one category!";
	header('location:news.php');
}
// file upload options
$target_dir = 'uploads/';
$target_file = $target_dir.basename($_FILES['image']['name']);

$imagetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if ($imagetype != 'jpg' || $imagetype != 'png' || $imagetype != 'jpeg') {
		
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {

			// select DB
			$query = "INSERT INTO news (id,title, category, p_date,image, body) VALUES(null,'$title','$category','$p_date','$target_file','$body')";

			 $run_query = mysqli_query($conn, $query);
			 if ($run_query) {
			 	
			 	 session_start();
			 	 $_SESSION['success'] = "Your news has been successfully uploaded!";
			 	 header('location:news.php');
			 }
			 else{
			 	echo "error".mysqli_error($run_query);
			 }
			
		}
}

?>