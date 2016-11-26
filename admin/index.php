<!-- if I successfully figure out how to do this, credit goes to:
http://www.w3schools.com/php/php_file_upload.asp -->
<!DOCTYPE html>
<html>
<head>
  <title>Add/Remove Orders</title>
</head>
<body>

  <form action="index.php" method="post" enctype="multipart/form-data">
    <p style="width: 650px;">Give me a CSV file containing orders you'd like to add to the database.
      Note that the file cannot contain any commas or quotes inside the data fields.
      The easiest way to fix this is to open the CSV in Excel, do a "find and replace",
      search for commas and quotes, and set the replacement data as nothing. Failure
      to do this won't kill the database; it just won't upload the data.
      <br><br>
      TODO: add a way of handling error messages that explain to the user what
      exactly is wrong with their upload.
    </p>
    <input type="file" name="fileUpload" id="fileUpload">
    <input type="submit" value="Upload Data!" name="submit">

    <?php var_dump($_FILES); ?>
    <br><br>
    <?php
    $target_file = "/Library/WebServer/Documents/shipdetailgenerator/admin/uploads/".basename($_FILES["fileUpload"]["name"]);
    echo $target_file;
    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    ?>
  </form>
</body>
</html>
