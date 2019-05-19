
function interest_add(){
  var interest = $("#InterestInput").val();

    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sb/interest_add.php",
      type: "POST",
      data: {
        // category:category,
        // keyword:keyword,
        interest: interest,
        // latest:latest,
        // alphabet:alphabet,
        // rate:rate,
        // bestrate:bestrate
      },
      success: function(data) {
        $("#interest").html(data);
      }
    }) ;

  }

  function interest_delete(){
    var interest = $("#SearchInput").val();

      $.ajax({
        url:
          "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sb/interest_delete.php",
        type: "POST",
        data: {
          // category:category,
          // keyword:keyword,
          interest: interest,
          // latest:latest,
          // alphabet:alphabet,
          // rate:rate,
          // bestrate:bestrate
        },
        success: function(data) {
          $("#interest").html(data);
        }
      }) ;

    }
