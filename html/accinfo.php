<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<body>
<style>
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
</style>
<fieldset>
  <legend style="font-family:sans-serif;">Account Information:</legend>

<form style="font-family:sans-serif;" action="save_info.php" method="post">
  Account No: 
  <label><?php echo $_SESSION['USERDATA']['AccNum']; ?></label> 
  <br>
  First Name: 
  <input type="text" name="fname" value="<?php echo $_SESSION['USERDATA']['FirstName'];?>"></input> 
  <br>
  Last Name: 
  <input type="text"name="lname" value="<?php echo $_SESSION['USERDATA']['LastName']; ?>"></input> 
  <br><br>
  Street:
  <input type="text"name="housenumber" value="<?php echo $_SESSION['USERDATA']['HouseNumber']; ?>"></input> 
  <input type="text"name="street" value="<?php echo $_SESSION['USERDATA']['Street']; ?>"></input> 
  <br>
  City:&nbsp;&nbsp; &nbsp;     
  <input type="text"name="city"><?php echo $_SESSION['USERDATA']['City']; ?></input> 
  State: 
  <input size=14 type="text"name="state"><?php echo $_SESSION['USERDATA']['State']; ?></input> 
  <br><br>
  Example Input Box:<br>
  <input type="text" name="rout">
  <br><br>  
 </fieldset> 
<input name="action" type="submit"  width="80px" height="30px" font-size="8px" value="Save" formaction="save_info.php"> </button>
<input name="action"  type="submit" width="80px" height="30px" font-size="8px" value="Cancel" formaction="save_info.php"> </button>
</form> 

</body>
</html>
