<?php
include('db_connect.php');
session_start();
// initialize variables 
$username = '';
$errors = array();
if (isset($_POST['user_reg'])) {
	// retrieve all form information
	$full_name = mysqli_real_escape_string($conn, $_POST['fname']);
	$username = mysqli_real_escape_string($conn, $_POST['uname']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$rpassword = mysqli_real_escape_string($conn, $_POST['rpassword']);
	// validation 
	if (empty($full_name)) {
		array_push($errors, "Full Name is required!");
	}
	if (empty($username)) {
		array_push($errors, "Useranme is required!");
	}
	if (empty($password)) {
		array_push($errors, "password is required!");
	}
	if (empty($rpassword)) {
		array_push($errors, "Re-Type password is required!");
	}
	if ($password != $rpassword) {
		array_push($errors, "Passwords do not match!");
	}

	$check_query = "SELECT * FROM users WHERE username = '$username'";
	$exe_query = mysqli_query($conn,$check_query);
	if (mysqli_num_rows($exe_query) > 0) {
		array_push($errors, "Username aleardy exist, please try another!");
	}
	if (count($errors) > 0) {
		$_SESSION['error'] = $errors;
		header('location:register.php');
	}
	else{
		$enpassword = md5($password);
		// insert query
		$query = "INSERT INTO users (id,full_name,username, password) VALUES(null,'$full_name','$username','$enpassword')";
		if (mysqli_query($conn, $query)) {
			$_SESSION['full_name'] = $full_name;
			$_SESSION['username'] = $username;
			$_SESSION['success'] ="You are logged in!";
			header('location:news.php');
		}
		else{
			echo "Error".mysqli_error($conn);
		}
	}




}

?>