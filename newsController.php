<?php
include('db_connect.php');

$title = $_POST['title'];
$p_date	= $_POST['p_date'];
$category = $_POST['category'];
$body	= $_POST['body'];

echo $p_date;

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
// select DB
$db = mysqli_select_db($conn, 'tech_news');
$query = "INSERT INTO news (id,title, category, p_date, details) VALUES(null,'$title','$category','$p_date','$body')";

 $run_query = mysqli_query($conn, $query);
 if ($run_query) {
 	
 	 session_start();
 	 $_SESSION['success'] = "Your news has been successfully uploaded!";
 	 header('location:news.php');
 }
 else{
 	echo "error".mysqli_error($run_query);
 }



?>