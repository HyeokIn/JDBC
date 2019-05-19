<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');


$category = $_POST['category'];

$keyword = $_POST['keyword'];

$addSearchSql = "INSERT INTO Search(keyword, user_id, search_time)
VALUES ('$keyword', 22, NOW())";

$result = mysqli_query($conn, $addSearchSql);

$interest = $_POST["interest"];
$latest = $_POST["latest"];
$alphabet = $_POST["alphabet"];
$rate = $_POST["rate"];
$bestrate = $_POST["bestrate"];

$sql_interest="";
$sql_orderbyLatest="";
$sql_orderbyAlpha="";
$sql_orderbyRate="";
$sql_orderbyRate_fromCategory1="";

  $sql="SELECT *
  FROM `Doc` WHERE title NOT LIKE '%$keyword%' AND contents NOT LIKE '%$keyword%'
  ";

if($interest!=""){
    $sql_interest ="
      ORDER BY (CASE WHEN category1 = '정치' THEN 0 ELSE 1 END)";
      $sql.=$sql_interest;
  }

if($latest!=""){
      $sql_latest ="
        ORDER BY create_date DESC";
        $sql.=$sql_latest;
  }
if($alphabet!=""){
        $sql_alphabet ="
          ORDER BY title ASC";
          $sql.=$sql_alphabet;
  }
  if($rate!=""){
          $sql_rate ="
            ORDER BY score DESC";
            $sql.=$sql_rate;
    }





$sql2="SELECT word2 FROM  `Related_word` WHERE word1 LIKE '%$keyword%'";


$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$result2 = mysqli_query($conn, $sql2);
$num2 = mysqli_num_rows($result2);

if($result2){
   $j=0;
   $record_count = mysqli_num_rows($result2);
   while($row = mysqli_fetch_object($result2)){
     $c[$j]=$row->word2;
     $j++;
   }
   mysqli_free_result($result2);
 }

//echo $sql;
?>

<style media="screen">
.table {
  text-align: center !important;
  vertical-align: middle;
}
</style>

<div class="container">
  <div class="related" style="font-weight:bold; font-size:18px;">
  연관검색어 : <?=$c[0]?>, <?=$c[1]?>
  </div>
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
       <td><?=$itemdata["score"]?></td>
       </tr>
       <?	$num=$num-1;
       }?>
       </div>
	     </tbody>
        </table>
      </div>
