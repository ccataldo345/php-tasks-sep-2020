<!DOCTYPE html>
<html lang="en">

<head>
  <title>Car Insurance Calculator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

  <div class="container">

    <?php

    $value = $tax = $installments = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $value = test_input($_POST["value"]);
      $tax = test_input($_POST["tax"]);
      $installments = test_input($_POST["installments"]);
    }

    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    ?>

    <br>
    <h2>Car insurance calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      Estimated value of the car (100 - 100 000 EUR): <input type="number" name="value" required="required" min="100" max="100000" step="100">
      <br><br>
      Tax percentage (0 - 100%): <input type="number" name="tax" required="required" min="1" max="100" step="1">
      <br><br>
      Number of instalments (count of payments in which client wants to pay for the policy (1 – 12)): <input type="number" name="installments" required="required" min="1" max="12" step="1">
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<br><h2>Your Input:</h2>";
    echo "Estimated value of the car: " . number_format($value, 0, 0, " ") . " EUR \n";
    echo "<br>";
    echo "Tax percentage: " . $tax . "% \n";
    echo "<br>";
    echo "Number of instalments: " . $installments;
    ?>

    <br><br>


    <table class="table">
      <thead class="thead-light">
        <tr>
          <th></th>
          <th>Policy</th>
          <?php for ($i = 1; $i <= $installments; $i++) { ?>
            <th><?= $i ?> installment</th>
          <?php } ?>
        </tr>
      </thead>
      <tr>
        <td>Value</td>
        <td><?= number_format($value, 2); ?></td>
      </tr>
      <tr>
        <td>Base Premium (11%)</td>
        <td><?= number_format($value * 0.11, 2); ?></td>
        <?php for ($i = 1; $i <= $installments; $i++) { ?>
          <td><?= number_format($value * 0.11 / $installments, 2); ?></td>
        <?php } ?>
      </tr>
      <tr>
        <td>Commission (17%)</td>
        <td><?= number_format($value * 0.11 * 0.17, 2); ?></td>
        <?php for ($i = 1; $i <= $installments; $i++) { ?>
          <td><?= number_format($value * 0.11 * 0.17 / $installments, 2); ?></td>
        <?php } ?>
      </tr>
      <tr>
        <td>Tax (<?=$tax?>%)</td>
        <td><?= number_format($value * 0.11 * $tax / 100, 2); ?></td>
        <?php for ($i = 1; $i <= $installments; $i++) { ?>
          <td><?= number_format($value * 0.11 * $tax / 100 / $installments, 2); ?></td>
        <?php } ?>
      </tr>
      <tr>
        <td><b>TOTAL COST</b></td>
        <td><b><?= number_format(($value * 0.11) + ($value * 0.11 * 0.17) + ($value * 0.11 * ($tax / 100)), 2); ?></b></td>
        <?php for ($i = 1; $i <= $installments; $i++) { ?>
          <td><?= number_format((($value * 0.11) + ($value * 0.11 * 0.17) + ($value * 0.11 * ($tax / 100))) / $installments, 2); ?></td>
        <?php } ?>
      </tr>
    </table>

  </div>
</body>

</html>