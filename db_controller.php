<?php
include('db_connect.php');

$dbname = $_POST['dbname'];
 if (isset($dbname) && !empty($dbname)) {
 	
 	$query = "CREATE DATABASE ".$dbname;
 	$exec_query = mysqli_query($conn, $query);
 		if ($exec_query) {
 			session_start();
 			$_SESSION['success_mgs'] = "Your database has been successfully created!";
 			header('location:dbform.php');
 		}
 		else{
 			session_start();
 			$_SESSION['msg'] = "Error in database creation".mysqli_error();
 			header('location:dbform.php');
 		}


 }
 else
 {
 	session_start();
 	$_SESSION['msg'] = "Please fill out the form";
 	header('location:dbform.php');
 }

?>