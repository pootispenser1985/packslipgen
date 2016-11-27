<?php
$target_file = "/Library/WebServer/Documents/shipdetailgenerator/admin/uploads/".basename($_FILES["fileUpload"]["name"]);
if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

$insertQuery = "
  LOAD DATA INFILE '".$target_file."'
  INTO TABLE Orders
  FIELDS TERMINATED BY ','
  (@Internal_ID, @Enter_Date, @Ship_Date, Name, Address, Ship_Method,
  Ship_Via, @SO_Num, PO_Num, SKU, Ship_Qty, Casepack)
  SET
  Internal_ID = nullif(@Internal_ID, ''),
  Enter_Date = nullif(@Enter_Date, ''),
  Ship_Date = nullif(@Ship_Date, ''),
  SO_Num = nullif(@SO_Num, '');
";
?>
<br>
<br>
<?php
  include 'vars.php';
  $db = new mysqli('localhost', $SQLUser, $SQLPass, 'packslipgen');
  $result = $db->query($insertQuery);
  echo $result;
?>
<br><br>
<a href="http://172.53.2.81/shipdetailgenerator/admin">Go Back</a>
