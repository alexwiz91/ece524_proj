<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<body>
<style>
#container {
	width:100%;
	text-align:center;
}
#container > div {
	width: calc(100%/2);
	display:inline-block;
	vertical-align: top;
	text-align:center;
	margin=2%
	padding=20px;
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
</style>
<fieldset>
  <legend style="font-family:sans-serif;">Account Information:</legend>

<form style="font-family:sans-serif;" method="GET">
<!--  Account Type:<br>
  <select style="font-family:sans-serif; name="aType">
     <option value="chk">Checkings</option>
     <option value="sav">Savings</option>
	 <option value="loan">Loan</option>
	 <option value="ccard">CreditCard</option>	 
  </select>	
  
  <span>
  <input type="submit" value="Submit">  
  </span> -->
  <span>
  <br>
  Hello 
  <label><?php echo $_SESSION['USERDATA']['FirstName'] . "!"; ?></label> 
<button title="update account information" id="close-image" formaction="accinfo.php" method="post"><img src="img/settings.png"></button>
<input type='submit' title="Logout" formaction="logout.php" value="Logout"></button>
  </span>
  <br>
  Account No: 
  <label><?php echo $_SESSION['USERDATA']['AccNum']; ?></label> 
  <br>
  </fieldset>
  <fieldset>
  <legend style="font-family:sans-serif;">Money Transfer Options</legend>
  <div>To Account Number:</div>
  <div><input type="text" size="5" name="routAcc"></div>
  <div>Amount:</div>
  <div><input type="text" size="10" name="amt"></div>
  <input action="transfer" name="transfer" type="submit" value="Submit Transfer" formaction="transfer.php" method="GET"></input>
  </div>
  <div>External Routing Number:</div>
  <div><input type="text" size="5" name="routingNum"></div>
  <div>External Bank Account Number:</div>
  <div><input type="text" size="10" name="eBankAcc"></div>
  <div>Amount:</div>
  <div><input type="text" size="10" name="extAmt"></div>
  <input action="ext_transfer" name="ext_transfer" type="submit" value="Submit External" formaction="transfer.php" method="GET"></input>
  </div>
<!--  <br><br>  
  Available Checking Balance:
  <label><?php echo $_SESSION['USERDATA']['checkingBalance']; ?></label> 
  <br><br>
  Available Savings Balance:
  <label><?php echo $_SESSION['USERDATA']['savingsBalance']; ?></label> 
  -->
 </fieldset> 
  
<fieldset>
  <legend style="font-family:sans-serif;">Recent Transactions:</legend>
<table style="width:50%">
  <tr>
    <th>Description</th>
    <th>Amount</th> 
    <th>Balance</th>
  </tr>
<?php 
	include "server_init.php";
	$sql_query = "use ece524_proj;";
	$conn->query($sql_query);
	$sql_query = "SELECT * from Transactions where AccNum='" . $_SESSION['USERDATA']['AccNum'] . "';";
	$result = $conn->query($sql_query);
	$currBalance = $_SESSION['USERDATA']['checkingBalance'];
	$firstBalance = $currBalance;
	$resultsArray = array();
	if($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())	
		{
			$resultsArray[] = array('Vendor' => $row['Vendor'], 'TransactionAmt' => $row['TransactionAmt']);
			$firstBalance = $firstBalance + $row['TransactionAmt'];
		}
		$sizeArr = count($resultsArray);
		echo "<tr>";
		echo "<td></td>";
		echo "<td><span style=\"font-weight:bold\">Current Balance:</span> </td>";
		echo "<td><span style=\"font-weight:bold\">" . $firstBalance . "</span></td>";
		echo "</tr>";
		for($i=0; $i<$sizeArr; $i++)
		{
			$currBalance = $currBalance +  $resultsArray[$i]['TransactionAmt'];
			echo "<tr>";
			echo "<td>" . $resultsArray[$i]['Vendor']. "</td>";
			echo "<td>" . $resultsArray[$i]['TransactionAmt']. "</td>";
			echo "<td>" . $currBalance . "</td>";
			echo "</tr>";
		}
		echo "<tr>";
		echo "<td></td>";
		echo "<td><span style=\"font-weight:bold\">Current Balance:</span> </td>";
		echo "<td><span style=\"font-weight:bold\">" . $currBalance . "</span></td>";
		echo "</tr>";

	}
	
?>
</table>
</fieldset> 
  
</form> 

</body>
</html>
