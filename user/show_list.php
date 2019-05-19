<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../inc/m-config.php');
  //리스트 불러오기
  global $wpdb;

  $sql = "SELECT
  *
  FROM `User` WHERE is_exist=1";
  //echo $sql;
  $result = mysqli_query($conn, $sql);

  $output.= '<style media="screen">
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
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>';

  			while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){

  				$output.='
  				<tr id="'.$itemdata["user_id"].'">
  			 <td>'.$itemdata["id"].'</td>
  			 <td>'.$itemdata["name"].'</td>
  			 <td>'.$itemdata["birth"].'</td>
         <td>'.$itemdata["sex"].'</td>
         <td>
         <button type="button" class="btn btn-success" data-toggle="modal" onclick="update('.$itemdata["user_id"].')" data-target="#rateModal">
           Update
         </button>
         <button type="button" class="btn btn-danger" data-toggle="modal" onclick="setId('.$itemdata["user_id"].')" data-target="#delModal">
           Delete
         </button>

         </td>
  			 </tr>

  			 </div>
  				';
  			}
  				$output.='	</tbody>
  		  	</table>
  			</div>
  ';
  echo $output;
?>
