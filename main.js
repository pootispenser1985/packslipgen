$("#searchForm").submit(function(event) {
  event.preventDefault();
  submitForm();
});

function submitForm() {
  var ponum = $("#poSearchBox").val();
  var doctype = $("#docSelect").val();
  var url = "";

  if (doctype === "bol") {
    url = 'bol/display.php?PO=' + ponum;
  }

  else if (doctype === "packslip") {
    url = 'packslip/display.php?PO=' + ponum;
  }
  
  $("#poSearchBox").val(null); //erase contents of search box
  $("#displayArea").load(url); //insert the results into the div displayArea
}

function showError(error) {
  $("#errorArea").html(error);
}
