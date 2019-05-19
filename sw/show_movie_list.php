<?php
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
$duration = $_POST["duration"];
$quality = $_POST["quality"];

$sql_quality="";
$sql_duration="";

$sql="SELECT
v.video_id,
d.url,
v.title,
v.thumbnail,
v.duration,
v.quality,
v.source,
d.create_date
FROM `Video` AS v
INNER JOIN Doc AS d ON
v.doc_id = d.doc_id
WHERE v.title like '%$keyword%'
";

if($duration!=""){
    $sql_duration ="
      ORDER BY duration";
      $sql.=$sql_duration;
  }
  if($quality!=""){
      $sql_quality ="
        ORDER BY quality";
        $sql.=$sql_quality;
    }

$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

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
        <th>No</th>
        <th>Url</th>
        <th>Title</th>
        <th>Thumbnail</th>
        <th>Duration</th>
        <th>Quality</th>
        <th>Source</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>

      	<?while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>

        <tr id="<?=$itemdata["video_id"]?>">
       <td><?=$num?></td>
       <td><?=$itemdata["url"]?></td>
       <td><?=$itemdata["title"]?></td>
       <td><?=$itemdata["thumbnail"]?></td>
       <td><?=$itemdata["duration"]?></td>
       <td><?=$itemdata["quality"]?></td>
       <td><?=$itemdata["source"]?></td>
       <td><?=$itemdata["create_date"]?></td>
       </tr>
       <?	$num=$num-1;
       }?>
       </div>
	     </tbody>
        </table>
      </div>
