<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');

$keyword = $_POST['keyword'];

if ($keyword!=''){

  $sql1_2 = "DELETE FROM Star WHERE keyword = '$keyword' ";
  $sql1_3 = "SELECT keyword FROM Star WHERE user_id = '1'";

  mysqli_query($conn, $sql1_2);

  $result1_3 = mysqli_query($conn, $sql1_3);

  if($result1_3){
     $z=0;
     $record_count1_3 = mysqli_num_rows($result1_3);
     while($row1_3 = mysqli_fetch_object($result1_3)){
       $h[$z]=$row1_3->keyword;
       $z++;
     }
     mysqli_free_result($result1_3);
   }
}
?>

<br /> 회원 1의 즐겨찾는 검색어 <br />
<?php
    for($i=0; $i<$record_count1_3; $i=$i+1)
    {
      echo ($i+1). ": &emsp;";
      echo $h[$i]."<br />";
    }
?>
