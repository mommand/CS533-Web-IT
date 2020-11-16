<?php
// global
// $x = 5;
$name = "AMD company";
$b_service = "Software Development";

function TestFuntion(){
	global $x;
	$x = 10;
	echo "inside of function value is.  ".$x."<br>";
}

// TestFuntion();
// echo "out side of function value is.   ".$x;

function org_service(){
	$org_name = $GLOBALS['name'];
	$org_service = $GLOBALS['b_service'];

	echo $org_name."<br>".$org_service;

}
 org_service();




?>