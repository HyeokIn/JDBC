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
    <h1>Message</h1>
  </div>
</div>

<div class="row justify-content-md-center">

<div class="col">

  <button type="button" class="btn btn-primary m-1" name="button"  data-toggle="modal" data-target="#msgModal">
    <i class="fas fa-plus"></i>&nbsp&nbspNew Message
  </button>
  <button type="button" class="btn btn-success m-1" name="button" onclick="InBox()">
    <i class="fas fa-envelope"></i>&nbsp&nbspInbox
  </button>

  <button type="button" class="btn btn-success m-1" name="button" onclick="sentBox()">
    <i class="fas fa-envelope"></i>&nbsp&nbspOutBox
  </button>

</div>

</div>




<div id="item_data">

</div>


<!-- Modal -->
<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="msgModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>To :</b> <input type="text" class="" id="userToId" name="userToId" >
        <br>
        <label for="exampleFormControlTextarea1">Message:</label>
        <textarea class="form-control rounded-0" id="msgContent" rows="10"></textarea>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="sendMessage();" data-dismiss="modal">Sent</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" onclick="deleteUser();" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
<?php require_once('message_main.js'); ?>
</script>
