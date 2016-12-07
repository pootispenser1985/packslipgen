<!-- Bill of Lading -->
<!DOCTYPE html>
<html>
<head>

</head>
<?php
  $bolnum = 5732;
  $carrier = 'Old  Dominion';
  $cartons = 0;
  $class = 125;
  $date = '12/6/16';
  $nmfc = '63035-00';
  $ponum = '';
  $pronum = '06312593217';
  $rdon = '12/10/16';
  $scac = 'ODFL';
  $weight = 0;
  $shipper = array(
    'name' => "Griffin Technology",
    'address' => "1706 Heil Quaker Blvd",
    'citystatezip' => "La Vergne TN, 37086",
    'phone' => "(615) 399-7000"
  );
  $consignee = array(
    'name' => "Fred's Discount Stores",
    'address' => "300 Apple Ave",
    'citystatezip' => "Walla Walla WA, 90654",
    'phone' => "(555) 555-5555"
  );
?>
<body>
  <div class="container">
    <div class="row" id="header">
      <div class="col-xs-4" id="date">
        <h4>Date:</h4>
      </div>
      <div class="col-xs-4 text-center" id="title">
        <h3><b>BILL OF LADING</b></h3>
      </div>
      <div class="col-xs-4 text-right" id="pageNum">
        <h4>Page ____ Of ____</h4>
      </div>
    </div>
    <div class="row" id="addressInfo">
      <div class="col-xs-6">
        <p id="shipperAddress">
          <b>Name: </b><?php echo $shipper['name']; ?><br>
          <b>Address: </b><?php echo $shipper['address']; ?><br>
          <b>City/State/Zip: </b><?php echo $shipper['citystatezip']; ?><br>
          <b>Phone: </b><?php echo $shipper['phone']; ?>
        </p>
        <p id="consigneeAddress">
          <b>Name: </b><?php echo $consignee['name']; ?><br>
          <b>Address: </b><?php echo $consignee['address']; ?><br>
          <b>City/State/Zip: </b><?php echo $consignee['citystatezip']; ?><br>
          <b>Phone: </b><?php echo $consignee['phone']; ?>
        </p>
      </div>
      <div class="col-xs-6" id="refnums">
        <p>
          <b>Bill of Lading Number: </b><?php echo $bolnum; ?><br>
          <b>RDON: </b><?php echo $rdon; ?>
        </p>
        <p>
          <b>Carrier Name:</b> <?php echo $carrier; ?><br>
          <b>Seal Num: </b>
        </p>
        <p>
          <b>SCAC: </b><?php echo $scac; ?><br>
          <b>PRO Number: </b><?php echo $pronum; ?><br><br>
        </p>
        <p>
          <b>Freight Charge Terms </b><br>
          Prepaid ___ Collect ___ Third Party ___
        </p>
      </div>
    </div>
    <div class="row LRborder" id="specialInstructions">
      <h6>SPECIAL INSTRUCTIONS</h6>
    </div>
    <div class="row LRborder text-center">
      <h6>ORDER INFORMATION</h6>
    </div>
    <div class="row" id="orderInfo">
      <table border="1px solid black" class="bolTable" width="100%">
        <tr>
          <th>CUSTOMER ORDER NUMBER</th><th>CARTONS</th><th>WEIGHT</th><th>ADDITIONAL INFO</th>
        </tr>
          <td>&nbsp</td><td></td><td></td><td></td>
        <tr>
          <td>&nbsp</td><td></td><td></td><td></td>
        </tr>
        <tr>
          <td>&nbsp</td><td></td><td></td><td></td>
        </tr>
        <tr>
          <td>GRAND TOTAL</td><td></td><td></td><td></td>
        </tr>
      </table>
    </div>
    <div class="row LRborder text-center">
      <h6>CARRIER INFORMATION</h6>
    </div>
    <div class="row" id="carrierInfo">
      <table border="1px solid black" class="bolTable" width="100%">
        <tr>
          <th>QTY</th><th>TYPE</th><th>QTY</th><th>TYPE</th>
          <th>WEIGHT</th><th>H.M. (x)</th><th>COMMODITY DESCRIPTION</th><th>NMFC</th><th>CLASS</th>
        </tr>
        <tr>
          <td>&nbsp</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        </tr>
        <tr>
          <td></td><td>SKIDS</td><td></td><td>CTNS</td>
          <td></td><td></td><td>MP3 PLAYER ACCESSORIES</td><td><?php echo $nmfc; ?></td><td><?php echo $class; ?></td>
        </tr>
      </table>
    </div>
    <div class="row LRborder" id="signatures">
      <div class="col-xs-4">
        <h6>SHIPPER SIGNATURE / DATE</h6>
        <p class="smallest">
          This is to certify that the above named materials are properly classified,
          described, packaged, marked and labeled, and are in proper condition for
          transportation according to the applicable regulations of the U.S. DOT.
        </p>
      </div>
      <div class="col-xs-2">
        <h6>Trailer Loaded:</h6>
        <input type="checkbox"><small> By Shipper<br>
        <input type="checkbox"> By Driver</small>
      </div>
      <div class="col-xs-2">
        <h6>Freight Counted:</h6>
        <input type="checkbox"><small> By Shipper<br>
        <input type="checkbox"> By Driver - By Pallet </small>
      </div>
      <div class="col-xs-4" style="border-right: none;">
        <h6>CARRIER SIGNATURE / PICKUP DATE</h6>
        <p class="smallest">
          Carrier acknowledges receipt of packages and required placards. Carrier
          certifies emergency response information was made available and/or carrier
          has the U.S. DOT emergency response guidebook or equivalent
          documentation in the vehicle.
        </p>
      </div>
    </div>
  </div>
</body>
</html>
