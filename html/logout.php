<?php
$_POST = NULL;
$_POST['USERDATA'] = NULL;
$_POST['DEACTIVATED'] = NULL;
$_SESSION['DEACTIVATED'] = NULL;
$_SESSION = NULL;
header("Refresh: 3; URL=index.html");
echo "Logout Successful! See you next time :)";
?>
