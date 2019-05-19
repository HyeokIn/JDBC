

<?php

// ****Search******
//$semester = $_POST['semester'];



// if($semester=='' && $category=='' && $subitem=='' &&$keyword==''){
//
// }else{
// 	if(!($keyword=='')){
// 		$sql.=' WHERE '.$column_name.' LIKE "%'.$keyword.'%"
// 		';
// 		$sql.=' AND r.semester = "'.$semester.'"';
// 		$sql.=' AND cname = "'.$category.'"';
// 		$sql.=' AND subitem_name="'.$subitem.'"';
//
//
// 	}else{
// 		$sql.=' WHERE r.semester = "'.$semester.'"';
// 		$sql.=' AND cname = "'.$category.'"';
// 		$sql.=' AND subitem_name="'.$subitem.'"';
//
// 	}
//
// }
//
// if(!($sort_column=='' || $_POST["order"] =='')){
// 	$sql.=' ORDER BY '.$sort_column.' '.$_POST["order"];
// }
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../inc/m-config.php');
  //리스트 불러오기
  global $wpdb;
  $id = $_POST['id'];
  //$subitem = $_POST['subitem'];
  //$column_name = $_POST['columnType'];
  $rate = $_POST['rate'];
  echo $id;
  echo $rate;
  // ***Sort*****
  //$sort_column = $_POST["column_name"];
  $sql  = "INSERT INTO Evaluate (user_id,doc_id,score) VALUES (5,$id,$rate);";
  $result = mysqli_query($conn, $sql);



  $sql2="CREATE VIEW T1 AS
   SELECT doc_id as id,ROUND(AVG(score),1) as avg FROM Evaluate GROUP BY doc_id;";
  $result2 = mysqli_query($conn, $sql2);

  $sql4="CREATE VIEW T2 AS
  SELECT Doc.doc_id as id ,T1.avg as T2_avg FROM Doc,T1 WHERE Doc.doc_id=T1.id;";
  $result2 = mysqli_query($conn, $sql4);

  $sql5="UPDATE Doc,T2 SET score=T2.T2_avg WHERE Doc.doc_id=T2.id;";
  $result2 = mysqli_query($conn, $sql5);

  $sql3 = "SELECT
  *
  FROM `Doc`";
  //echo $sql;
  $result3 = mysqli_query($conn, $sql3);

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

  			while($itemdata = mysqli_fetch_array($result3,MYSQLI_ASSOC)){

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
         <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rateModal">
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
  ?>
  
<?
  echo $output;
?>
