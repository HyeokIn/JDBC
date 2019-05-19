<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');

$interest = $_POST['interest'];

$sql1 = "UPDATE User SET interest_field = '$interest' Where user_id = '22'";
$sql2 = "SELECT interest_field FROM User WHERE user_id = '22'";
mysqli_query($conn, $sql1);

$result1 = mysqli_query($conn, $sql2);
if($result1){
   $itrs = mysqli_fetch_object($result1)->interest_field;
   mysqli_free_result($result1);
 }

?>

 <br />USER 22의 Interest field <br />
 <br />
 <?php
       echo $itrs." <br />";
   ?>
