<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');


$id = $_POST['id'];
$pwd = $_POST['password'];
$name = $_POST['name'];
$bd = $_POST['bd'];
$gender = $_POST['gender'];
$itr = $_POST['interest'];


$sql="INSERT INTO User (id, pw, name, birth, sex, is_exist, interest_field)
VALUES ('$id', '$pwd', '$name', '$bd', '$gender', 1, '$itr')
";
$result = mysqli_query($conn, $sql);

echo $sql;
echo $result;
?>
