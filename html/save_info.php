<?php
session_start();
include "server_init.php";
if($_POST['action'] == "Save")
{
	echo "Saving Account information...";
	$house = $_POST['housenumber'];
	$street = $_POST['street'];	
	$fname = $_POST['fname'];	
	$lname = $_POST['lname'];	
	$city = $_POST['city'];	
	$state = $_POST['state'];	
	$email = $_POST['email'];	
	$acc = $_POST['lblAcc'];
	$pw = $_POST['pw'];
	$sql_query="use ece524_proj";
	$conn->query($sql_query);
	if($_FILES['profilePic']['size'] > 0)
	{
		$upload_dir = "img/";
		$upload_file = $upload_dir . $_SESSION['USERDATA']['AccNum'] . ".jpg";
		$uploadOk = 1;
		if(move_uploaded_file($_FILES['profilePic']['tmp_name'], $upload_file))
		{
			echo "Successfully uploaded file ". $upload_file . ".";
		}
		else
		{
			echo "Error Uploading file";
		}
		$sql_query= "UPDATE UserInfo SET firstname='" . $fname . "'," . "lastname='" . $lname . "'," . "city='" . $city . "', state='" . $state . "', email='" . $email . "',housenumber='" . $house . "',street='" . $street . "',password='" . $pw . "',profilePicPath='" . $upload_file . "' where AccNum='" . $acc . "'";
	}
	else
	{
		$sql_query= "UPDATE UserInfo SET firstname='" . $fname . "'," . "lastname='" . $lname . "'," . "city='" . $city . "', state='" . $state . "', email='" . $email . "',housenumber='" . $house . "',street='" . $street . "',password='" . $pw . "' where AccNum='" . $acc . "'";
	}
	$result = $conn->query($sql_query);
	if($result)
	{
		$_SESSION['updatedinfo'] = TRUE;
	}
	else
	{
		$_SESSION['updatedinfo'] = FALSE;
	}
	$sql_query="SELECT * FROM UserInfo where AccNum='" . $acc . "';";
	$result = $conn->query($sql_query);
	$_SESSION['USERDATA'] = $result->fetch_assoc();
	echo "Headed back to account information page";
	header("Location: accinfo.php");
	exit();
}
else if($_POST['action'] == "Cancel")
{
	header('Location: mainpage.php');
	exit();
}
else if($_POST['action'] == "Delete Account")
{
	header('Refresh: 5; URL=index.html');
	$acc = $_POST['lblAcc'];
	$sql_query = "use ece524_proj;";
	$conn->query($sql_query);
	$sql_query= "UPDATE UserInfo SET deactivated=1 where AccNum='" . $acc . "';";
	$result = $conn->query($sql_query);
	if($result)
	{
		echo "Your account has been deleted, logging out now....";
	}
	else
	{
		echo "problem deleting accont";
	}
	die();
}
else
{
	echo "Failed! ". $_POST['action'];
}

?>
