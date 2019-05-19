<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');

$content = $_POST['content'];
$category = $_POST['category'];

$sql="INSERT INTO Feedback (user_id, content, category)
VALUES (22, '$content', '$category')
";
$result = mysqli_query($conn, $sql);

echo $sql;
echo $result;
?>
