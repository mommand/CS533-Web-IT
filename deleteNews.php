<?php
include('db_connect.php');
mysqli_select_db($conn, 'news');
$id = $_GET['id'];
$del_news = "DELETE FROM news WHERE id = $id";

if (mysqli_query($conn,$del_news)) {
	session_start();
	$_SESSION['msg'] =" Record has been successfully deteleted";
	header('location:shownews.php');
}
?>