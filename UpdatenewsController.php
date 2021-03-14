<?php
include('db_connect.php');
mysqli_select_db($conn, 'news');
// 
$id = $_POST['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$p_date = $_POST['p_date'];
$body = $_POST['body'];

// query
$q = "UPDATE news SET title = '$title', p_date = '$p_date', category = $category, body = '$body' WHERE id = $id";

if (mysqli_query($conn, $q)) {
	
	session_start();
	$_SESSION['success'] = "Record updated!";
	header('location:shownews.php');
}
else{
	 echo "Error".mysqli_error($conn);
}



?>