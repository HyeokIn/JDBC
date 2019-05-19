function sendFeedback(){
  var content = $("#feedBack").val();
  var category = $("#category").val();
  console.log(content);
    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/feedback/feedback_send.php",
      type: "POST",
      data: {
        content:content,
        category:category
      },
      success: function(data) {
        console.log(data);
        alert('Feedback sent.');
      }
    });
}

function myFeedback(){
  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/feedback/show_feedback.php",
    method: "POST",
    success: function(data) {
      $("#item_data").html(data);
    }
  });
}
