<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');

$chosung = $_POST['chosung'];

$sql="SELECT *
FROM `Dictionary` WHERE chosung='$chosung' ";

$result = mysqli_query($conn, $sql);

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
        <th>Word</th>
        <th>Meaning</th>
      </tr>
    </thead>
    <tbody>

      	<?while($itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>

        <tr id="'.$itemdata["doc_id"].'">
      <td><?=$itemdata["dic_id"]?></td>
       <td><?=$itemdata["north_word"]?></td>
       <td><?=$itemdata["meaning"]?></td>

       </tr>
       <?
       }?>
       </div>
	     </tbody>
        </table>
      </div></div>
