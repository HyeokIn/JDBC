function fetch_search_word(){

  var keyword = $("#SearchInput").val();
    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/dictionary/byKeyword.php",
      type: "POST",
      data: {
        keyword:keyword,
      },
      success: function(data) {
        $("#item_data").html(data);
      }
    });

  }

  function fetch_search_chosung(chosung){

    var chosung = chosung;
      $.ajax({
        url:
          "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/dictionary/byChosung.php",
        type: "POST",
        data: {
          chosung:chosung,
        },
        success: function(data) {
          $("#item_data").html(data);
        }
      });

    }

    function newWord(){

      var north = $("#north").val();
      var south = $("#south").val();
      var meaning = $("#meaning").val();
      var chosung = $("#chosung").val();

        $.ajax({
          url:
            "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/dictionary/newWord.php",
          type: "POST",
          data: {
            north:north,
            south:south,
            meaning:meaning,
            chosung:chosung,

          },
          success: function(data) {
            console.log(data);
            alert('New word added.');
          }
        });

      }
