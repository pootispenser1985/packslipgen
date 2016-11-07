<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://www.thrashcan.net/includes/jquery-3.1.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://thrashcan.net/includes/JsBarcode.all.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css?v=110616a">
  <link rel="stylesheet" href="print.css?v=110616c" type="text/css" media="print">
  <title>Shipment Detail Generator</title>
</head>
<body>
  <div class="container">
    <div id="searchRow" class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <form id="searchForm" role="form">
          <label for="poSearchBox">PO Number </label>
          <input id="poSearchBox" size="30" type="text">
          <input id="searchButton" type="submit" value="submit">
        </form>
      </div>
    </div>
    <div id="displayArea" class="row">
    </div>
  </div>
</body>

</html>
<script type="text/javascript" src="main.js?v=11116p"></script>
