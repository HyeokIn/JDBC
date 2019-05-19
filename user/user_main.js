var userId;


function fetch_item_data() {
  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/user/show_list.php",
    method: "POST",
    success: function(data) {
      $("#item_data").html(data);
    }
  });
}

function setId(id){
  userId = id;
  console.log(userId);
}

function deleteUser(){
  var id = userId;
      $.ajax({
        url:
          "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/user/delete.php",
        type: "POST",
        data: {
          id:id
        },
        success: function(data) {
          console.log(data);
          alert('User deleted.');
          fetch_item_data();
        }
      });
}


function register(){

  var id = $("#userId").val();
  var password = $("#userPw").val();
  var name = $("#userName").val();
  var birthday = $("#userBd").val();
  var gender = $("#userGd").val();
  var interest = $("#useritr").val();

    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/user/register.php",
      type: "POST",
      data: {
        id:id,
        password:password,
        name:name,
        bd:birthday,
        gender:gender,
        itr: interest
      },
      success: function(data) {
        console.log(data);
        alert('New user added.');
        fetch_item_data();
      }
    });

  }

  function update(updateid){

    var id = updateid;


      $.ajax({
        url:
          "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/user/update.php",
        type: "POST",
        data: {
          id:id,
        },
        success: function(data) {
          $("#item_data").html(data);
        }
      });

    }

    function updateQry(updateid){

      var usr_id = updateid;
      var id = $("#userId").val();
      var name = $("#userName").val();
      var birthday = $("#userBd").val();
      var gender = $("#userGd").val();
      var interest = $("#useritr").val();

        $.ajax({
          url:
            "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/user/update_query.php",
          type: "POST",
          data: {
            usr_id:usr_id,
            id:id,
            name:name,
            bd:birthday,
            gender:gender,
            itr: interest
          },
          success: function(data) {
            alert("User updated.");
            fetch_item_data();
          }
        });

      }

      function fetch_search_data(){

        var category=document.getElementById("category");
        category = category.options[category.selectedIndex].text;
        var keyword = $("#SearchInput").val();


          $.ajax({
            url:
              "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/user/user_search_list.php",
            type: "POST",
            data: {
              category:category,
              keyword:keyword,
            },
            success: function(data) {
              $("#item_data").html(data);
            }
          });


      }

      function fetch_birthBet_data(){


          $.ajax({
            url:
              "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/user/between9000.php",
            type: "POST",
            data: {

            },
            success: function(data) {
              $("#item_data").html(data);
            }
          });


      }
