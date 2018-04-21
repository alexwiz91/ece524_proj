<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<body>
<style>
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

<form style="font-family:sans-serif;"action="/action_page.php">
  Account Type:<br>
  <select style="font-family:sans-serif; name="aType">
     <option value="chk">Checkings</option>
     <option value="sav">Savings</option>
	 <option value="loan">Loan</option>
	 <option value="ccard">CreditCard</option>	 
  </select>	
  
  <span>
  <input type="submit" value="Submit">  
  </span>
  <br><br>
  First Name: 
  <label><?php echo $_SESSION['USERDATA']['FirstName']; ?></label> 
  <br><br>
  Last Name: 
  <label><?php echo $_SESSION['USERDATA']['LastName']; ?></label> 
  <br><br>
  Account No: 
  <label><?php echo $_SESSION['USERDATA']['AccNum']; ?></label> 
  <br><br>
  Example Input Box:<br>
  <input type="text" name="rout">
  <br><br>  
  Available Checking Balance:
  <label><?php echo $_SESSION['USERDATA']['checkingBalance']; ?></label> 
  <br><br>
  Available Savings Balance:
  <label><?php echo $_SESSION['USERDATA']['savingsBalance']; ?></label> 
 </fieldset> 
  
<fieldset>
  <legend style="font-family:sans-serif;">Recent Transactions:</legend>
<table style="width:50%">
  <tr>
    <th>Description</th>
    <th>Amount</th> 
    <th>Balance</th>
  </tr>
  <tr>
    <td>Direct Deposit</td>
    <td>500.00</td>
    <td>571.00</td>
  </tr> 
  <tr>
    <td>Starbucks coffee</td>
    <td>-4.00</td>
    <td>71.00</td>
  </tr>
  <tr>
    <td>Grocery</td>
    <td>-20.00</td>
    <td>75.00</td>
  </tr>
  <tr>
    <td>Gas</td>
    <td>-25.00</td>
    <td>100.00</td>
  </tr>
</table>
</fieldset> 
  
</form> 

</body>
</html>
