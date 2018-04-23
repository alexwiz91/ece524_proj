
<?PHP
	if($_POST['action'] = "Cancel")
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
		if($result->num_rows > 0)
		{
			echo $username . " already exists in the database. Please go back and try another username.";
			echo "<br>";
		}
		else
		{
			$sql_query = "INSERT INTO UserInfo (FirstName, LastName, username, password) VALUES (" . "\"".$firstname."\"" . ", " . "\"". $lastname  ."\"". ", " . "\"". $username ."\"" . ", " . "\"". $pw ."\"" . ");";
			if($conn->query($sql_query) == TRUE)
			{
				echo "Username " . $username . "created in database";
				echo "<br>";
			}
			else
			{
				 echo "Error: " . $sql_query . "<br>" . $conn->error;
			}
			$sql_query = "SELECT * FROM UserInfo;";
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
		}
	}

?>
