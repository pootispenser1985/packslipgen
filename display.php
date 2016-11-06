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
  <h2 class="col-xs-6">Shipment Detail List</h2>
  <div class="col-xs-6 text-right">
    <img id="barcode">
    </img>
    <?php
    echo '<script type="text/javascript">JsBarcode("#barcode", "'.$SO.'", {displayValue: false});</script>';
    ?>
  </div>
</div>
<div class="row heading">
  <div class="col-xs-6"><b>Customer: &nbsp</b><?php echo $this_line['Name']; ?></div>
  <div class="col-xs-6 text-right"><b>Order# &nbsp</b><?php echo $this_line['SO_Num']; ?></div>
</div>
<div class="row heading">
  <div class="col-xs-6"><b>Address: &nbsp</b><?php echo $this_line['Address']; ?></div>
  <div class="col-xs-6 text-right"><b>PO# &nbsp</b><?php echo $this_line['PO_Num']; ?></div>
</div>
<div class="row heading">
  <div class="col-xs-6"><b>Carrier: &nbsp</b><?php echo $this_line['Ship_Via']; ?></div>
  <div class="col-xs-6 text-right"><b>Ship Date: &nbsp</b><?php echo $this_line['Ship_Date']; ?></div>
</div>

<div class="row">
  <section class="col-xs-12">
    <table>
      <thead>
        <tr height="20px">
          <th width="21%">Part Number</th><th width="13%">Ship Quantity</th>
          <th width="13%">Master Packs</th><th style="text-align: center" width="53%">Notes</th>
        </tr>
      </thead>
      <tr height="45px">
        <?php
          echo "<td>".$this_line['SKU']."</td>"; //part#
          echo "<td align=\"center\">".$this_line['Ship_Qty']."</td>"; //num of units
          echo "<td align=\"center\">".($this_line['Ship_Qty'] / $this_line['Casepack'])."</td>"; //masterpack quantity
          echo "<td></td>";
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
      echo '<tr height="45px">';
      echo "<td>".$this_line['SKU']."</td>"; //part#
      echo "<td align=\"center\">".$this_line['Ship_Qty']."</td>"; //num of units
      echo "<td align=\"center\">".($this_line['Ship_Qty'] / $this_line['Casepack'])."</td>"; //masterpack quantity
      echo "<td></td>";
      echo "</tr>";
      }
  }
?>
    </table>
  </section>
</div>
