<?php
require_once('../inc/m-config.php');

$id = $_POST['id'];

$sql="SELECT * FROM User
     WHERE user_id=$id
";
$result = mysqli_query($conn, $sql);

$itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC);

// echo $id;
// echo $sql;
 ?>


<style media="screen">
.table {
  text-align: center !important;
  vertical-align: middle;
}
</style>

<div class="container">
  <div class="col-md-4">
  ID : <input type="text" class="" id="userId" name="userId" value="<?=$itemdata['id']?>">
  Name : <input type="text" class="" id="userName" name="userName" value="<?=$itemdata['name']?>">
  Birth : <input type="text" class="" id="userBd" name="userBd" value="<?=$itemdata['birth']?>">
  Gender : <input type="text" class="" id="userGd" name="userGd" value="<?=$itemdata['sex']?>">
  Interest : <input type="text" class="" id="useritr" name="useritr" value="<?=$itemdata['interest_field']?>">
</div>

<div class="row m-5">
  <button type="button" class="btn btn-success" data-toggle="modal" onclick="updateQry(<?=$id?>)" data-target="#rateModal">
    Update
  </button>
</div>
</div>
