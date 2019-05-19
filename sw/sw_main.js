function fetch_item_data() {
  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/show_list.php",
    method: "POST",
    success: function(data) {
      $("#item_data").html(data);
    }
  });
}
