<?PHP
	session_start();
	if($_POST['action'] == "New User")
	{
		header('Location: new_user.html');
		exit();
	}
	else if($_POST['action'] == "Login")
	{
		$_SESSION['POSTDATA'] = $_POST;
		header('Location: login_process.php');
		exit();
	}
	else
	{
	}
?>
