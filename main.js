$("#searchForm").submit(function(event) {
  event.preventDefault();
  submitForm();
});

function submitForm() {
  var ponum = $("#poSearchBox").val();
  $("#poSearchBox").val(null);

  var url = 'display.php?PO=' + ponum;

  $("#displayArea").load(url);
}
