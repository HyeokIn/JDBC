<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../inc/m-config.php');
  //리스트 불러오기
  global $wpdb;

  $sql = "SELECT
  *
  FROM `Feedback`";
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
          <th>Content</th>
          <th>Category</th>

        </tr>
      </thead>
      <tbody>';

  			while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){

  				$output.='
  				<tr id="'.$itemdata["id"].'">
          <td>'.$itemdata["id"].'</td>
  			 <td>'.$itemdata["content"].'</td>
  			 <td>'.$itemdata["category"].'</td>

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
