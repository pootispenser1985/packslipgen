<?php
  include 'vars.php';
  $PO = $_GET['PO'];
  $PO = "'".$PO."'";

  $db = new mysqli('localhost', $SQLUser, $SQLPass, 'packslipgen');
  $result = $db->query('SELECT * FROM Orders WHERE `PO_Num` = '.$PO);

  $this_line = $result->fetch_assoc();
  $SO = "*".$this_line['SO_Num']."*"; //this is for the barcode generator below
?>

<div class="row">
  <h2 class="col-xs-6 text-center">Shipment Detail List</h2>
  <div class="col-xs-6">
    <img id="barcode">
    </img>
    <?php
    echo '<script type="text/javascript">JsBarcode("#barcode", "'.$SO.'", {displayValue: false});</script>';
    ?>
  </div>
</div>
<div class="row">
  <div class="col-xs-6"><b>Customer: &nbsp</b><?php echo $this_line['Name']; ?></div>
  <div class="col-xs-6"><b>Order# &nbsp</b><?php echo $this_line['SO_Num']; ?></div>
</div>
<div class="row">
  <div class="col-xs-6"><b>Address: &nbsp</b><?php echo $this_line['Address']; ?></div>
  <div class="col-xs-6"><b>PO# &nbsp</b><?php echo $this_line['PO_Num']; ?></div>
</div>
<div class="row">
  <div class="col-xs-6"><b>Carrier: &nbsp</b><?php echo $this_line['Ship_Via']; ?></div>
  <div class="col-xs-6"><b>Ship Date: &nbsp</b><?php echo $this_line['Ship_Date']; ?></div>
</div>

<div class="row">
  <section class="col-xs-10">
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
<?php //fetch the next associative array from the sql result, shit out a table row,
      //keep doing this until you run out of results
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
