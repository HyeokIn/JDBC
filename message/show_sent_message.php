<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../inc/m-config.php');
  //리스트 불러오기
  global $wpdb;

  $sql = "SELECT
  m.id AS message_id,
  u.id,
  m.content,
  m.created
  FROM `Message` AS m
  INNER JOIN `User` AS u ON
  m.user_id_to = u.user_id
  WHERE m.user_id_from = 22";
  // echo $sql;
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
          <th>No</th>
          <th>To</th>
          <th>Content</th>
          <th>Date</th>

        </tr>
      </thead>
      <tbody>';

  			while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){

  				$output.='
  				<tr id="'.$itemdata["message_id"].'">
          <td>'.$itemdata["message_id"].'</td>
  			 <td>'.$itemdata["id"].'</td>
  			 <td>'.$itemdata["content"].'</td>
  			 <td>'.$itemdata["created"].'</td>

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
