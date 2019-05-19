<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');

// ****Search******
//$semester = $_POST['semester'];
$category = $_POST['category'];
//$subitem = $_POST['subitem'];
//$column_name = $_POST['columnType'];
$keyword = $_POST['keyword'];

// ***Sort*****
//$sort_column = $_POST["column_name"];
$order = $_POST["order"];

$sql="SELECT *
FROM `Doc` WHERE title like '%$keyword%' OR contents like '%$keyword%'
";
$sql2="SELECT word2 FROM `Related_word` WHERE word1 like'%$keyword%'
";



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

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$num = mysqli_num_rows($result);
$num2 = mysqli_num_rows($result2);


?>

<style media="screen">
.table {
  text-align: center !important;
  vertical-align: middle;
}
</style>

<?while($itemdata2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){?>
  <span><p><?=$itemdata2->word2?> </p></span>
  <? }?>


<div class="container">

    <div class="table-responsive-sm">
  <table class="table table-bordered">
    하이
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
    <tbody>

      	<?while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>

        <tr id="'.$itemdata["doc_id"].'">
       <td><?=$num?></td>
       <td><?=$itemdata["url"]?></td>
       <td><?=$itemdata["create_date"]?></td>
       <td><?=$itemdata["title"]?></td>
       <td><?=$itemdata["author"]?></td>
       <td><?=$itemdata["contents"]?></td>
       <td><?=$itemdata["publisher"]?></td>
       <td><?=$itemdata["category1"]?></td>
       <td><?=$itemdata["category2"]?></td>
       <td><?=$itemdata["added_date"]?></td>
       <td><?=$itemdata["count"]?></td>
       </tr>
       <?	$num=$num-1;
       }?>
       </div>
	     </tbody>
        </table>
      </div>
