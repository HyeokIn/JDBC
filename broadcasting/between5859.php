<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');

  $sql="SELECT *
  FROM `Broadcasting` WHERE date BETWEEN '2019-05-08' AND '2019-05-09'
  ";


$result = mysqli_query($conn, $sql);

//echo $sql;
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
        <th>Date</th>
        <th>Time</th>
        <th>Title</th>
      </tr>
    </thead>
    <tbody>

      	<?while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>

        <tr id="<?=$itemdata["id"]?>">
       <td><?=$itemdata["id"]?></td>
       <td><?=$itemdata["date"]?></td>
       <td><?=$itemdata["time"]?></td>
       <td><?=$itemdata["title"]?></td>

       </tr>
       <?
       }?>
       </div>
	     </tbody>
        </table>
      </div>
