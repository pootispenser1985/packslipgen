$("#searchForm").submit(function(event) {
  event.preventDefault();
  submitForm();
});

function submitForm() {
  var ponum = $("#poSearchBox").val();
  var url = 'display.php?PO=' + ponum;
  $("#poSearchBox").val(null); //erase contents of search box
  $("#displayArea").load(url); //insert the results into the div displayArea
}

function showError(error) {
  $("#errorArea").html(error);
}
