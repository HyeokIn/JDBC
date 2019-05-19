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
    <h1>User</h1>
  </div>
</div>

<div class="row justify-content-md-center">
  <select class="selectpicker" id="category" name="searchType">
    <option value="choose">Choose</option>
    <option value="Name">Name</option>
  </select>

  <input type="text" class="m-1" id="SearchInput" name="searchValue" placeholder="Enter the keyword.">

  <button type="button" class="btn btn-danger m-1" name="button"  onclick="fetch_search_data()"><i class="fas fa-search"></i>&nbsp&nbspSearch</button>


</div>

<div class="col">

  <button type="button" class="btn btn-primary m-1" name="button"  data-toggle="modal" data-target="#registerModal">
    <i class="fas fa-plus"></i>&nbsp&nbspRegister
  </button>

  <button type="button" class="btn btn-primary m-1" name="button"  onclick="fetch_birthBet_data()">
    &nbsp&nbspBorn in 1990 ~ 2000
  </button>


</div>




<div id="item_data">


</div>


<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	ID : <input type="text" class="" id="userId" name="userId">
          Password : <input type="text" class=""  id="userPw" name="userPw">
          Name : <input type="text" class="" id="userName" name="userName">
          Birth : <input type="text" class="" id="userBd" name="userBd">
          Gender : <input type="text" class="" id="userGd" name="userGd">
          Interest : <input type="text" class="" id="useritr" name="useritr">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="register();" data-dismiss="modal">Save</button>
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
<?php require_once('user_main.js'); ?>
  fetch_item_data();
</script>
