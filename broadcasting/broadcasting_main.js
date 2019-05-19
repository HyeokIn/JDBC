function fetch_item_data() {
  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/broadcasting/show_list.php",
    method: "POST",
    success: function(data) {
      $("#item_data").html(data);
    }
  });
}

function fetch_search_data(){


  var keyword = $("#SearchInput").val();


    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/broadcasting/search_list.php",
      type: "POST",
      data: {
        keyword:keyword,
      },
      success: function(data) {
        $("#item_data").html(data);
      }
    });


}

function fetch_5859_data(){



    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/broadcasting/between5859.php",
      type: "POST",
      data: {

      },
      success: function(data) {
        $("#item_data").html(data);
      }
    });


}
