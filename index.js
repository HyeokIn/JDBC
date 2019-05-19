$(document).ready(function() {
  $("#sw").on("click", function() {
    load_SW();
  });

  $("#jw").on("click", function() {
    load_JW();
  });

  $("#hi").on("click", function() {
    load_HI();
  });

  $("#sb").on("click", function() {
    load_SB();
  });

  $("#user").on("click", function() {
    load_user();
  });

  $("#message").on("click", function() {
    load_message();
  });

  $("#feedback").on("click", function() {
    load_feedback();
  });

  $("#daily").on("click", function() {
    load_daily();
  });

  $("#dictionary").on("click", function() {
    load_dictionary();
  });

  $("#broadcasting").on("click", function() {
    load_broadcasting();
  });

  $("#event").on("click", function() {
    load_event();
  });
  $("#etc").on("click", function() {
    load_etc();
  });

});
function load_etc() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/etc/etc_main.php"
  );
}


function load_event() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/event/event_main.php"
  );
}



function load_broadcasting() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/broadcasting/broadcasting_main.php"
  );
}


function load_dictionary() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/dictionary/dictionary_main.php"
  );
}

function load_message() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/message/message_main.php"
  );
}

function load_daily() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/daily/daily_main.php"
  );
}

function load_feedback() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/feedback/feedback_main.php"
  );
}

function load_SW() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/sw_main.php"
  );
}

function load_user() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/user/user_main.php"
  );
}

function load_JW() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/jw/jw_main.php"
  );
}

function load_HI() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/hi/hi_main.php"
  );
}

function load_SB() {
  $("#m_result").load(
    "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sb/sb_main.php"
  );
}



function deleteData(str) {
  var id = str;
  swal({
    title: "정말 삭제하시겠습니까?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then(willDelete => {
    if (willDelete) {
      $.ajax({
        type: "POST",
        url:
          "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/custom/item_list/delete.php",
        data: "id=" + id,
        success: function(data) {
          var data = data.trim();
          if (data == 1) {
            swal("삭제했습니다.", {
              icon: "success"
            });
          } else {
          }
        }
      });

      fetch_item_data();
    } else {
    }
  });
}

function fetch_item_data(page) {
  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/custom/item_list/show_list.php",
    method: "POST",
    data: { page: page },
    success: function(data) {
      $("#item_data").html(data);
    }
  });
}

function updateData(str) {
  var id = str;
  var itemname = $("#itemname-" + str).val();
  var itemlist = $("#itemlist-" + str).val();
  var weight = $("#weight-" + str).val();
  var desc1 = $("#desc1-" + str).val();
  var desc2 = $("#desc2-" + str).val();
  var isVisible = $("#isVisible-" + str + " input[type=radio]:checked").val();
  // console.log("itemname: " + itemname);
  // console.log("itemlist: " + itemlist);
  // console.log("weight: " + weight);
  // console.log("description: " + desc1);
  // console.log("itemname: " + desc2);
  // console.log("isVisible: " + isVisible);

  $.ajax({
    type: "POST",
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/custom/item_list/update.php",
    data: {
      id: id,
      itemname: itemname,
      itemlist: itemlist,
      weight: weight,
      desc1: desc1,
      desc2: desc2,
      isVisible: isVisible
    },
    success: function(data) {
      $(".modal").modal("hide");
      var data = data.trim();
      console.log(data);
      if (data == "1") {
        swal({
          title: "성공",
          text: "항목이 변경되었습니다.",
          icon: "success",
          button: "확인"
        });
      } else if (data == "2") {
        swal({
          title: "실패",
          text: "데이터베이스 오류입니다.",
          icon: "error",
          button: "확인"
        });
      } else {
        swal({
          title: "실패",
          text: "빈 항목을 확인하세요.",
          icon: "error",
          button: "확인"
        });
      }
      fetch_item_data();
    }
  });
}
