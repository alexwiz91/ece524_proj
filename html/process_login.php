<?PHP
	session_start();
	if($_POST['action'] == "New User")
	{
		header('Location: new_user.php');
		exit();
	}
	else if($_POST['action'] == "Login")
	{
		include "server_init.php";
		$sql_query = "use ece524_proj;";
		$conn->query($sql_query);
		$sql_query ="SELECT 1 from UserInfo where username='" . $_POST['username'] . "';";
		if($conn->query($sql_query))
		{
			$sql_query="SELECT deactivated, username, FirstName, LastName from UserInfo where username='" . $_POST['username'] . "';";
			$result = $conn->query($sql_query);
			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$deactivated = $row['deactivated'];
				if($deactivated)
				{
					$_SESSION['DEACTIVATED'] = 1;
					$_SESSION['D_USER'] = $row['username'];
					$_SESSION['D_FNAME'] = $row['FirstName'];
					$_SESSION['D_LNAME'] = $row['LastName'];
					header("Location: new_user.php"); 
					exit();
				}
				else
				{
					$_SESSION['POSTDATA'] = $_POST;
					header('Location: login_process.php');
					exit();
				}

			}
		}
		else
		{
			echo "Account does not exist";
		}

	}
	else
	{
		$_SESSION['POSTDATA'] = $_POST;
		header('Location: login_process.php');
		exit();
	}
	$_SESSION['POSTDATA'] = $_POST;
	header('Location: login_process.php');
	exit();
?>
