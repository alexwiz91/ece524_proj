<?php
session_start();
if($_POST['action'] == "Save")
{
	echo "Saving Account information...";

	sleep(5);

	header("Location: accinfo.php");
	exit();
}
else if($_POST['action'] == "Cancel")
{
	header('Location: mainpage.php');
	exit();
}
else
{
	echo "Failed! ". $_POST['action'];
}

?>
