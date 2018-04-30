<?PHP 
	session_start();
	include 'server_init.php';
	include 'common_db.php';
	$use_query = "USE ece524_proj;";	
	$result = $conn->query($use_query);
	$db_user = "";
	$db_pw = "";
	$user =  $_SESSION['POSTDATA']['username'];
	$pw =  $_SESSION['POSTDATA']['password'];
	$sql_query = "SELECT * FROM UserInfo where username='".$user."' and "."password='".$pw."';";
	$result = $conn->query($sql_query);
	if($result->num_rows == 1)
	{
		echo "SUCCESS, you should redirect now <br>";
		$row = $result->fetch_assoc();
		$_SESSION['USERDATA'] = $row;
		header('Location: mainpage.php');
		exit();
	}
	else
	{
		echo "Username / Password does not exist<br>";
		echo "<br><br><br><br><br><br><br><br>";
		echo "<b>Debug Information:</b><br>";
		echo "<b>Database name:</b> ece524_proj<br>";
		echo "<b>Table name:</b> UserInfo<br>";
		$curr_ip = exec("hostname -i");
		echo "<b>IP Address:</b>" . $curr_ip . "<br>";
		echo "<b>Problematic Query:</b><br>";
		echo $sql_query;
	}
//	if($result->num_rows > 0)
//	{
//		while($row = $result->fetch_assoc())
//		{
//			echo "username: " . $row["username"]. " - Name: " . $row["password"] . "<br>";
//		}
//	}
//	else
//	{
//		echo "zero results"."<br>";
//	}
//
?>
