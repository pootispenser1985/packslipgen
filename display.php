<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12./jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<?php
  include 'vars.php';
  $PO = $_GET['PO'];  
  $PO = "'".$PO."'";

  $db = new mysqli('localhost', $SQLUser, $SQLPass, 'packslipgen');
  $result = $db->query('SELECT * FROM Orders WHERE `PO_Num` = '.$PO);
  
  $this_line = $result->fetch_assoc();
?>

<div class="container">
  <div class="row">
    <h2 class="col-sm-12 text-center">Shipment Detail List</h2>
  </div>
  <div class="row">
    <div class="col-sm-6"><b>Customer: &nbsp</b><?php echo $this_line['Name']; ?></div>
    <div class="col-sm-6 text-right"><b>PO: &nbsp</b><?php echo $this_line['PO_Num']; ?></div>
  </div>
  <div class="row">
    <div class="col-sm-6"><b>Address: &nbsp</b><?php echo $this_line['Address']; ?></div>
    <div class="col-sm-6 text-right"><b>Order# &nbsp</b><?php echo $this_line['SO_Num']; ?></div>
  </div>
  <div class="row">
    <div class="col-sm-6"><b>Carrier: &nbsp</b><?php echo $this_line['Ship_Via']; ?></div>
    <div class="col-sm-6 text-right"><b>Ship Date: &nbsp</b><?php echo $this_line['Ship_Date']; ?></div>
  </div>

  <div class="row">
    <section class="col-sm-12">
      <table>
        <tr>
          <th>Line</th><th>Part Number</th><th>Ship Quantity</th><th>Master Packs</th>
        </tr>
        <tr>
          <?php
            echo "<td>".$this_line['Line']."</td><td>".$this_line['SKU']."</td>";
            echo "<td>".$this_line['Ship_Qty']."</td>";
            echo "<td>".($this_line['Ship_Qty'] / $this_line['Casepack'])."</td>";
          ?>
        </tr>
<?php
  while (3 < 5) {
    $this_line = $result->fetch_assoc();
    if ($this_line == NULL) {
      break;
    }
    else {
      echo "<tr>";
      echo "<td>".$this_line['Line']."</td><td>".$this_line['SKU']."</td>";
      echo "<td>".$this_line['Ship_Qty']."</td>";
      echo "<td>".($this_line['Ship_Qty'] / $this_line['Casepack'])."</td>";
      echo "</tr>";
      }
  }
?>
      </table>
    </section>
  </div>
  <div class="row">
    <a class="col-sm-3" href="/Library/Webserver/Documents/shipdetailgenerator/index.php">
  </div>
</div>

</body>
</html> 
