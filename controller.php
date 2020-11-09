<?php
// super global variable
if (isset($_POST['age']) && !empty($_POST['age'])) {
	$age = $_POST['age'];
	switch ($age) {
		case 10:
			if (true) {
				echo "done";
			}
			break;
		case 20:
			echo "You are adult";
			break;
		case 30:
			echo "Don't warry, you are young!";
			break;
		case 40:
			echo "You would be a best grandfather";
			break;
		case 50:
			echo "Sorry, you will die. please take care and don't to KU";
			break;
		default:
			echo " We are ready to burry you!";
			break;
	}
}
else
{
	echo "please check again!";
}



?>