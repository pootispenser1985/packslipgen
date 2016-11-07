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
          <th width="23%">Part Number</th>
          <th width="12%">Ship Qty</th>
          <th width="12%">MP Qty</th>
          <th width="12%">IP Qty</th>
          <th style="text-align: center" width="41%">Notes</th>
        </tr>
      </thead>
      <tr height="45px">
        <?php
          $mp_qty = $ip_qty = $ea_qty = $mp_total = $ip_total = $qty_total = 0;

          if ($this_line['Ship_Qty'] % $this_line['Casepack'] == 0) {
            //do this if evenly divisible by mp
            $mp_qty = $this_line['Ship_Qty'] / $this_line['Casepack'];
          }
          else {
            //do this is amt is not divisble into mp, go down next pack lvl
            //figure ip_qty
            $mp_qty = floor($this_line['Ship_Qty'] / $this_line['Casepack']);
            $ip_qty = ($this_line['Ship_Qty'] % $this_line['Casepack']) / 4;
          }
          echo "<td>".$this_line['SKU']."</td>"; //part#
          echo "<td align=\"center\">".$this_line['Ship_Qty']."</td>"; //num of units
          echo "<td align=\"center\">".$mp_qty."</td>"; //masterpack quantity
          echo "<td align=\"center\">".$ip_qty."</td>"; //Innerpack quantity
          echo "<td></td>"; //note section
          $mp_total = $mp_qty;
          $ip_total = $ip_qty;
          $qty_total = $this_line['Ship_Qty'];
          $mp_qty = $ip_qty = 0;
        ?>
      </tr>
      <?php //fetch the next associative array from the sql result, shit out a table row,
            //keep doing this until you run out of results
        while (3 < 5) {
          $this_line = $result->fetch_assoc();
          if ($this_line == NULL) { //break when you run out
            break;
          }
          else {
            if ($this_line['Ship_Qty'] % $this_line['Casepack'] == 0) {
              //do this if evenly divisible by mp
              $mp_qty = $this_line['Ship_Qty'] / $this_line['Casepack'];
            }
            else {
              //do this is amt is not divisble into mp, go down next pack lvl
              //figure ip_qty
              $mp_qty = floor($this_line['Ship_Qty'] / $this_line['Casepack']);
              $ip_qty = ($this_line['Ship_Qty'] % $this_line['Casepack']) / 4;
            }
            echo '<tr height="45px">';
            echo "<td>".$this_line['SKU']."</td>"; //part#
            echo "<td align=\"center\">".$this_line['Ship_Qty']."</td>"; //num of units
            echo "<td align=\"center\">".$mp_qty."</td>"; //masterpack quantity
            echo "<td align=\"center\">".$ip_qty."</td>"; //innerpack quantity
            echo "<td></td>"; //note section
            echo "</tr>";
            $mp_total += $mp_qty;
            $ip_total += $ip_qty;
            $qty_total += $this_line['Ship_Qty'];
            $mp_qty = $ip_qty = 0;
          }
        }
        echo "<tr height=\"30px\"><td><b>Totals:</td>";
        echo "<td align=\"center\"><b>".$qty_total."</b></td><td align=\"center\"><b>".$mp_total."</b></td><td align=\"center\"><b>".$ip_total;
        echo "</b></td></tr>";
      ?>
    </table>
  </section>
</div>
