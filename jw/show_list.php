<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../inc/m-config.php');
  //리스트 불러오기
  global $wpdb;

  $sql = "SELECT
  doc_id,
  url,
  create_date,
  title,
  author,
  contents,
  publisher,
  category1,
  category2,
  added_date,
  count
  FROM `Doc`";
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
