<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../../../wp-config.php');
  //리스트 불러오기
  global $wpdb;
?>

<link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/sw_main.css" />







<div class="listWrapper">


  <div class="row justify-content-md-center">
    <div id="KUTitle" class="col-md-auto m-5">
    <h1>Feedback</h1>
  </div>
</div>

<div class="row justify-content-md-center">

<div class="col">

  <button type="button" class="btn btn-primary m-1" name="button"  data-toggle="modal" data-target="#feedbackModal">
    <i class="fas fa-plus"></i>&nbsp&nbspNew Feedback
  </button>
  <button type="button" class="btn btn-success m-1" name="button" onclick="myFeedback()">
    <i class="fas fa-paper-plane"></i>&nbsp&nbspMyFeedback
  </button>


</div>

</div>




<div id="item_data">

</div>


<!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="feedbackModalLabel">Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>Category : </b> <input type="text" class="" id="category" name="userToId" >
        <br>
        <label for="exampleFormControlTextarea1">Feedback:</label>
        <textarea class="form-control rounded-0" id="feedBack" rows="10"></textarea>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="sendFeedback();" data-dismiss="modal"><i class="fas fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
<?php require_once('feedback_main.js'); ?>
</script>
