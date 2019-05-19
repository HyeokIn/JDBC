<?

require_once('../inc/m-config.php');

$usr_id=$_POST["usr_id"];
$id = $_POST['id'];
$pwd = $_POST['password'];
$name = $_POST['name'];
$bd = $_POST['bd'];
$gender = $_POST['gender'];
$itr = $_POST['interest'];


$sql="UPDATE `User` SET
id = '$id',
name = '$name',
birth = '$bd',
sex = '$gender',
interest_field = '$itr'
WHERE user_id=$usr_id
";

$result = mysqli_query($conn, $sql);


?>
