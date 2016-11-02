$("#searchForm").submit(function(event) {
  event.preventDefault();
  submitForm();
});

$("#printableBtn").click(makePrintable);
$("#normalBtn").click(normalView);

function submitForm() {
  var ponum = $("#poSearchBox").val();

  var url = 'display.php?PO=' + ponum;

  $("#displayArea").load(url);
  $("#viewControls").show();
  $("#poSearchBox").val(null);
}

function makePrintable() {
  $("#searchForm").hide();
}

function normalView() {
  $("#searchForm").show();
}
