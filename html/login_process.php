<?PHP 
	session_start();
	include 'server_init.php';
	include 'common_db.php';
	$use_query = "USE ece524_proj;";	
	$result = $conn->query($use_query);
	$sql_query = "SELECT username, password FROM UserInfo;";
	$result = $conn->query($sql_query);
	$db_user = "";
	$db_pw = "";
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$db_user = $row["username"];
			$db_pw = $row["password"];
		}

	}
	$user =  $_SESSION['POSTDATA']['username'];
	$pw =  $_SESSION['POSTDATA']['password'];
	if($user == $db_user && $pw == $db_pw)
	{
		echo "SUCCESS, you should redirect now <br>";
		$sql_query = "SELECT * FROM UserInfo where username='".$db_user."' and "."password='".$db_pw."';";
		$result = $conn->query($sql_query);
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$_SESSION['USERDATA'] = $row;
			header('Location: accountinfo.php');
			exit();
		}

	}
	else
	{
		echo "FAILURE!!!!";
	}

	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "username: " . $row["username"]. " - Name: " . $row["password"] . "<br>";
		}
	}
	else
	{
		echo "zero results"."<br>";
	}

?>
