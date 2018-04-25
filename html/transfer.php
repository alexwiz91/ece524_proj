<?php 
	session_start();
	include "server_init.php";
	$to_acc=$_GET['routAcc'];
	$amt=$_GET['amt'];
	if(!is_numeric($amt) || floatval($amt) < 0)
	{
		header("Refresh: 2; URL=mainpage.php");
		echo "Enter a valid number!";
		exit();
	}
	$amt = round(floatval($amt), 2);
	$from_acc=$_SESSION['USERDATA']['AccNum'];
	$sql_query = "Select * from UserInfo where AccNum='" . $to_acc . "';";
	$result = $conn->query($sql_query);
	if($result->num_rows > 0)
	{
		$sql_query = "INSERT INTO Transactions (AccNum, TransactionAmt, TransString, Vendor) VALUES (" . "\"". $to_acc ."\"" . ", " . "\"". $amt  ."\"". ", " . "\"TRANSFER-FROM". $from_acc ."\"" . ", " . "\"TRANSFER-FROM:" . $from_acc . "\"" . ");";
		echo $sql_query;
		$conn->query($sql_query);
		$sql_query = "INSERT INTO Transactions (AccNum, TransactionAmt, TransString, Vendor) VALUES (" . "\"". $from_acc ."\"" . ", " . "\"". (-1*$amt)  ."\"". ", " . "\"TRANSFER-TO". $to_acc ."\"" . ", " . "\"TRANSFER-TO:" . $to_acc . "\"" . ");";
		echo $sql_query;
		$conn->query($sql_query);
		header("Location: mainpage.php");
		exit();
	}
	else
	{
		header("Refresh: 2; URL=mainpage.php");
		echo "Bad AccNumber entered!";
		exit();
	}
?>
