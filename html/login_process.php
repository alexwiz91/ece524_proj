<?PHP 
	include 'server_init.php';
	include 'common_db.php';
	$use_query = "USE ece524_proj;";	
	$result = $conn->query($use_query);
	$sql_query = "SELECT username, password FROM UserInfo;";
	$result = $conn->query($sql_query);
	$user =  $_POST['username'];
	$pw =  $_POST['password'];
	echo $user."<br>"; 
	echo $pw."<br>";
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
