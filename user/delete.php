<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');


$id = $_POST['id'];


$sql="DELETE FROM User
     WHERE user_id='$id'
";
$result = mysqli_query($conn, $sql);

echo $sql;
echo $result;
?>
