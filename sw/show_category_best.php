<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../inc/m-config.php');
  //리스트 불러오기
  global $wpdb;

  $bestrate = $_POST["bestrate"];


      $sql="CREATE VIEW T3 AS SELECT * FROM Doc ORDER BY score DESC limit 50;";
      $result=mysqli_query($conn, $sql);
      $sql2="SELECT * FROM T3 group by category1;";
      $result=mysqli_query($conn, $sql2);

  //echo $sql;


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
          <th>Url</th>
          <th>Created</th>
  				<th>Title</th>
  				<th>Author</th>
  				<th>Contents</th>
  				<th>Publisher</th>
  				<th>Category1</th>
  				<th>Category2</th>
  				<th>Added</th>
          <th>Count</th>
          <th>Rate</th>
          <th>Rate</th>
        </tr>
      </thead>
      <tbody>';

  			while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){

  				$output.='
  				<tr id="'.$itemdata["doc_id"].'">
  			 <td>'.$itemdata["doc_id"].'</td>
  			 <td>'.$itemdata["url"].'</td>
  			 <td>'.$itemdata["create_date"].'</td>
  			 <td>'.$itemdata["title"].'</td>
  			 <td>'.$itemdata["author"].'</td>
  			 <td>'.$itemdata["contents"].'</td>
         <td>'.$itemdata["publisher"].'</td>
         <td>'.$itemdata["category1"].'</td>
         <td>'.$itemdata["category2"].'</td>
         <td>'.$itemdata["added_date"].'</td>
         <td>'.$itemdata["count"].'</td>
         <td>'.$itemdata["score"].'</td>
         <td><button type="button" class="btn btn-primary" data-toggle="modal" onclick="setId('.$itemdata["doc_id"].')" data-target="#rateModal">
           Rate
         </button></td>
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
