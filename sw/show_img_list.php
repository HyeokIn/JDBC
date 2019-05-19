<?php
require_once('../inc/m-config.php');

// ****Search******
//$semester = $_POST['semester'];
$category = $_POST['category'];
//$subitem = $_POST['subitem'];
//$column_name = $_POST['columnType'];
$keyword = $_POST['keyword'];
$imagesize = $_POST['imagesize'];
// ***Sort*****
//$sort_column = $_POST["column_name"];
$order = $_POST["order"];
$sql_imagesize="";

$sql="SELECT
i.img_id,
d.url,
i.url AS `img_url`,
i.title,
i.size,
d.create_date
FROM `Image` AS i
INNER JOIN Doc AS d ON
i.doc_id = d.doc_id
WHERE i.title like '%$keyword%'
";

if($imagesize!=""){
    $sql_imagesize ="
      ORDER BY size";
      $sql.=$sql_imagesize;
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
        <th>Image Url</th>
        <th>Title</th>
        <th>Size</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>

      	<?while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>

        <tr id="<?=$itemdata["img_id"]?>">
       <td><?=$num?></td>
       <td><?=$itemdata["url"]?></td>
       <td><?=$itemdata["img_url"]?></td>
       <td><?=$itemdata["title"]?></td>
       <td><?=$itemdata["size"]?></td>
       <td><?=$itemdata["create_date"]?></td>
       </tr>
       <?	$num=$num-1;
       }?>
       </div>
	     </tbody>
        </table>
      </div>
