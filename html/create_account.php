
<?PHP
	session_start();

	function writeDatabase($sql_query, $username, $conn)
	{
		if($conn->query($sql_query) == TRUE)
		{
			if($_SESSION['DEACTIVATED'] == 1)
			{
				$deactive_query = "UPDATE UserInfo SET deactivated=0 where username='" . $username . "';";
				
				if( $conn->query($deactive_query))
				{
					echo "Account Reactivated! " . $username . "'s password updated in database";
					echo "<br>";
					$_SESSION['DEACTIVATED'] = 0;
					header("Refresh: 3; URL=index.html");
					exit();
				}
			}
			else
			{
				echo "Username " . $username . "created in database";
				echo "<br>";
				header("Refresh: 2; URL=index.html");
				echo "Username created, please log in with new information";
				exit();
			}
		}
	}

	if($_POST['action_cancel'] == "Cancel")
	{
		header("Location: index.html");
		exit();
	}
	else
	{
		include 'server_init.php';
		include 'common_db.php';
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$pw = $_POST['password'];
		$use_query = "USE ece524_proj;";	
		$result = $conn->query($use_query);
		$insert_attempt = "SELECT * FROM UserInfo where username='". $username . "'";
		$result = $conn->query($insert_attempt);
		if($result->num_rows > 0 && $_SESSION['DEACTIVATED'] == 0 )
		{
			echo $username . " already exists in the database. Please go back and try another username.";
			echo "<br>";

		}
		else if($_SESSION['DEACTIVATED'])
		{
			$sql_query = "UPDATE UserInfo SET password='" . $pw ."' where username='" . $username ."'";
			writeDatabase($sql_query, $username, $conn);
		}
		else
		{
			$sql_query = "INSERT INTO UserInfo (FirstName, LastName, username, password) VALUES (" . "\"".$firstname."\"" . ", " . "\"". $lastname  ."\"". ", " . "\"". $username ."\"" . ", " . "\"". $pw ."\"" . ");";
			writeDatabase($sql_query, $username, $conn);
		}
/*			$sql_query = "SELECT * FROM UserInfo;";
			$select_result = $conn->query($sql_query);
			if($select_result->num_rows > 0)
			{
				while($row = $select_result->fetch_assoc())
				{
					echo "username: " . $row["username"]. " - password: " . $row["password"] ."First Name: " . $row["firstname"]."<br>";
				}
			}
			else
			{
				echo "Reporting out table failed"."<br>";
			}
			$select_result->close();
*/
	}

?>
