
<?php
// define variables and set to empty values
$name = $email = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        
?>

<h2>Car insurance calculator</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Estimated value of the car (100 - 100 000 EUR): <input type="number" name="name" required="required" min="100" max="100000" step="100">
  <br><br>
  Tax percentage (0 - 100%): <input type="number" name="email" required="required" min="1" max="100" step="1">
  <br><br>
  Number of instalments (count of payments in which client wants to pay for the policy (1 – 12)): <input type="number" name="website" required="required" min="1" max="12" step="1">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "Estimated value of the car: " . number_format($name,0,0," ") . " EUR \n";
echo "<br>";
echo "Tax percentage: " . $email . " % \n";
echo "<br>";
echo "Number of instalments: " . $website;
?>

<br><br>

<table>
  <tr>
    <th></th>
    <th>Policy</th>
    <th>1 installment</th>
    <th>2 installments</th>
  </tr>
  <tr>
    <td>Value</td>
  </tr>
  <tr>
    <td>Base Premium (11%)</td>
  </tr>
  <tr>
    <td>Commission (17%)</td>
  </tr>
  <tr>
    <td>Tax (10%)</td>
  </tr>
  <tr>
    <td><b>TOTAL COST</b></td>
  </tr>
</table>
