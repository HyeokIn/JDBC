function sendMessage(){
  var to = $("#userToId").val();
  var content = $("#msgContent").val();


    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/message/message_send.php",
      type: "POST",
      data: {
        to:to,
        content:content,
      },
      success: function(data) {
        console.log(data);
        alert('Message sent.');
      }
    });
}

function InBox(){
  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/message/show_message.php",
    method: "POST",
    success: function(data) {
      $("#item_data").html(data);
    }
  });
}

function sentBox(){
  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/message/show_sent_message.php",
    method: "POST",
    success: function(data) {
      $("#item_data").html(data);
    }
  });
}
