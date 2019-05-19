<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');


$north = $_POST['north'];
$south = $_POST['south'];
$meaning = $_POST['meaning'];
$chosung= $_POST['chosung'];



$sql="INSERT INTO Dictionary (north_word, south_word, meaning, chosung)
VALUES ('$north', '$south', '$meaning', '$chosung' )
";
$result = mysqli_query($conn, $sql);

echo $sql;
echo $result;
?>
