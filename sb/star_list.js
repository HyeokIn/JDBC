
function star_add(){
  var keyword = $("#SearchInput").val();

    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sb/star_add.php",
      type: "POST",
      data: {
        // category:category,
        keyword:keyword,
        // interest: interest,
        // latest:latest,
        // alphabet:alphabet,
        // rate:rate,
        // bestrate:bestrate
      },
      success: function(data) {
        $("#show_star").html(data);
      }
    }) ;

  }

  function star_delete(){
    var keyword = $("#SearchInput").val();

      $.ajax({
        url:
          "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sb/star_delete.php",
        type: "POST",
        data: {
          // category:category,
          keyword:keyword,
          // interest: interest,
          // latest:latest,
          // alphabet:alphabet,
          // rate:rate,
          // bestrate:bestrate
        },
        success: function(data) {
          $("#show_star").html(data);
        }
      }) ;

    }

    function star_show(){
      // var keyword = $("#SearchInput").val();

        $.ajax({
          url:
            "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sb/star_show.php",
          type: "POST",
          data: {
            // category:category,
            // keyword:keyword,
            // interest: interest,
            // latest:latest,
            // alphabet:alphabet,
            // rate:rate,
            // bestrate:bestrate
          },
          success: function(data) {
            $("#show_data").html(data);
          }
        }) ;

      }
