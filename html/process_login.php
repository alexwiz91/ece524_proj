<?PHP
	if($_POST['action'] == "New User")
	{
		header('Location: new_user.html');
		exit();
	}
	else if($_POST['action'] == "Login")
	{
		header('Location: login_process.php');
		exit();
	}
	else
?>
