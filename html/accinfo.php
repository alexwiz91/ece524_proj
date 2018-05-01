<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<body>
<style>
img 
{
	image-orientation: from-image;
}

html, body {
    width: 100%;
    height: 100%;
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    color: #444;
    -webkit-font-smoothing: antialiased;
    background: #f0f0f0;
}

button {
    display: inline-block;
    height: 30px;
    padding: 0;
    margin: 0;
    vertical-align: top;
    width: 30px;
}

#close-image img {
    display: block;
    height: 20px;  
    width: 20px;
}

#close-CSS {
    background-image: url( 'img/settings.png')
    background-size: 100px 130px;
    height: 134px;  
    width: 104px;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

#footer {
   position:absolute;
   bottom:0;
   font-family:century gothic;
   width:100%;
   height:30px;   /* Height of the footer */
   background:#acd6ef; ;
}

#header {
   position:absolute;
   top:0;
   font-size:200%;
   font-family:century gothic;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#acd6ef; ;
}

</style>
<head>
    <div id="header" align ="center">
	       <header> ECE Federal Credit Union </header>
   </div>
<br><br><br><br>
 
<fieldset>
  <legend style="font-family:sans-serif;">Update Account Information:</legend>
  <form style="font-family:sans-serif;" action="save_info.php" method="POST" enctype="multipart/form-data">
  <?php $img_src=$_SESSION['USERDATA']['profilePicPath']; ?>
  <img width='100' height='100' src="<?php echo $img_src ?>"></img>
  <input type="file" id="profilePic" name="profilePic"></input><br>
  Account No: 
  <label name='acc'><?php echo $_SESSION['USERDATA']['AccNum']; ?></label> 
  <input type="hidden" name='lblAcc' value="<?php echo $_SESSION['USERDATA']['AccNum']; ?>"></input>
  <br>
  First Name: 
  <input type="text" name="fname" value="<?php echo $_SESSION['USERDATA']['FirstName'];?>"></input> 
  <br>
  Last Name: 
  <input type="text" name="lname" value="<?php echo $_SESSION['USERDATA']['LastName']; ?>"></input> 
  <br><br><br>
  Email:
  <input type="text" name="email"  value ="<?php echo $_SESSION['USERDATA']['email']; ?>"></input> 
  <br>
  Street:
  <input type="text"name="housenumber" size ="6" value="<?php echo $_SESSION['USERDATA']['HouseNumber']; ?>"></input> 
  <input type="text"name="street" value="<?php echo $_SESSION['USERDATA']['Street']; ?>"></input> 
  <br>
  City:    
  <input type="text"name="city" value ="<?php echo $_SESSION['USERDATA']['City']; ?>"</input> 
  State: 
  <input type="text"name="state" size = "3" value ="<?php echo $_SESSION['USERDATA']['State']; ?>"</input> 
  <br><br>
<?php
	if($_SESSION['updatedinfo'])
	{
		echo '<span style="color: green;"/> Account Information Updated!</span>';
		$_SESSION['updatedinfo'] = FALSE;
	}
?>
	
 </fieldset> 
<fieldset style="font-family:sans-serif;" a>
  <legend>Change Password</legend>
  New Password:
  <input type="password" name="pw" value="<?php echo $_SESSION['USERDATA']['password']; ?>"></input>
</fieldset>
<input name="action" type="submit"  width="80px" height="30px" font-size="8px" value="Save" formaction="save_info.php"> </button>
<input name="action"  type="submit" width="80px" height="30px" font-size="8px" value="Cancel" formaction="save_info.php"> </button>
<input name="action"  type="submit" width="80px" height="30px" font-size="8px" value="Delete Account" formaction="save_info.php"> </button>
</form> 
<head>
    <div id="footer" align ="center">
	       <footer> &copy; Copyright 2018 ECE524 TEAM1234</footer>
   </div>
   <br><br><br><br>
</body>
</html>
