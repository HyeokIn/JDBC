<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');

$to = $_POST['to'];
$content = $_POST['content'];


$sql="SELECT user_id FROM `User` WHERE id ='$to'";
$result = mysqli_query($conn, $sql);
$itemdata = mysqli_fetch_array($result,MYSQLI_ASSOC);
$toId = $itemdata["user_id"];

echo $sql;

$sql="INSERT INTO Message (user_id_from, user_id_to, content)
VALUES (22, $toId, '$content')
";
$result = mysqli_query($conn, $sql);

echo $sql;
echo $result;
?>
