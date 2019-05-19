<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('../inc/m-config.php');

  $sql1_1 = "SELECT keyword FROM Star WHERE user_id = '1'";
  $result1_1 = mysqli_query($conn, $sql1_1);


    if($result1_1){
       $z=0;
       $record_count1_1 = mysqli_num_rows($result1_1);
       while($row1_1 = mysqli_fetch_object($result1_1)){
         $star[$z]=$row1_1->keyword;

         $sql1_2 = "SELECT * FROM `Doc` WHERE title like '%$star[$z]%' OR contents like '%$$star[$z]%' ORDER BY added_date DESC limit 1";
         $result1_2 = mysqli_query($conn, $sql1_2);

         if($result1_2){
            $title[$z] = mysqli_fetch_object($result1_2)->title;

            mysqli_free_result($result1_2);
          }
         $z++;
       }
       mysqli_free_result($result1_1);
     }
?>

<?php
    for($i=0; $i<$record_count1_1; $i=$i+1){
      echo ($i+1). ": &emsp;";
      echo $star[$i]." --> ";
      echo $title[$i]. "<br />";
    }
  ?>
