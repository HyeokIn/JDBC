<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../inc/m-config.php');
  //리스트 불러오기
  global $wpdb;

  $sql = "SELECT
  *
  FROM `Broadcasting` ";
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
          <th>No</th>
          <th>Date</th>
          <th>Time</th>
  				<th>Title</th>
        </tr>
      </thead>
      <tbody>';

  			while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){

  				$output.='
  				<tr id="'.$itemdata["id"].'">
  			 <td>'.$itemdata["id"].'</td>
  			 <td>'.$itemdata["date"].'</td>
  			 <td>'.$itemdata["time"].'</td>
         <td>'.$itemdata["title"].'</td>
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
