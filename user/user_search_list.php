<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');


$category = $_POST['category'];

$keyword = $_POST['keyword'];


if($category=="Choose"){
  $sql="SELECT *
  FROM `User` WHERE id like '%$keyword%'
  ";
}else{
  $sql="SELECT *
  FROM `User` WHERE name like '%$keyword%'
  ";
}

$result = mysqli_query($conn, $sql);

//echo $sql;
?>

<style media="screen">
.table {
  text-align: center !important;
  vertical-align: middle;
}
</style>

<div class="container">
    <div class="table-responsive-sm">
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Interest</th>
        <th>Manage</th>

      </tr>
    </thead>
    <tbody>

      	<?while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>

        <tr id="'.$itemdata["user_id"].'">
       <td><?=$itemdata["id"]?></td>
       <td><?=$itemdata["name"]?></td>
       <td><?=$itemdata["birth"]?></td>
       <td><?=$itemdata["sex"]?></td>
       <td><?=$itemdata["interest_field"]?></td>
       <td>
       <button type="button" class="btn btn-success" data-toggle="modal" onclick="update(<?=$itemdata["user_id"]?>)" data-target="#rateModal">
         Update
       </button>
       <button type="button" class="btn btn-danger" data-toggle="modal" onclick="setId(<?=$itemdata["user_id"]?>)" data-target="#delModal">
         Delete
       </button>

       </td>

       </tr>
       <?
       }?>
       </div>
	     </tbody>
        </table>
      </div>
