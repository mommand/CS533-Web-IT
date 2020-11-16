<?php
$score = $_GET['score'];
if (isset($score) && !empty($score)) {
	echo $score;
}
else{
	session_start();
	$_SESSION['msg'] ="Please fillout the form!";

	header('location:checkgrade.php');
}


?>