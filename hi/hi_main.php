<?php
define('__ROOT__', dirname(dirname(__FILE__)));
//require_once(__ROOT__.'/item_list/add_list.php');
require_once('../inc/m-config.php');
// require_once('../../../wp-config.php');

// global $wpdb;
// $conn->set_charset("utf8");

$sql1 = "SELECT keyword ,COUNT(keyword) as cnt FROM Search
WHERE DATE(search_time)=DATE('2019-05-11') GROUP BY keyword ORDER BY cnt DESC limit 5";

// $sql1 = "SELECT keyword as word,COUNT(keyword) as cnt FROM Search
// WHERE DATE(search_time)=DATE(NOW()) GROUP BY keyword ORDER BY cnt DESC limit 5";


$sql2 = "SELECT keyword ,COUNT(keyword) as cnt FROM Search
WHERE DATE(search_time) >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY keyword ORDER BY cnt DESC limit 5";

$sql3 = "SELECT keyword ,COUNT(keyword) as cnt FROM Search
WHERE DATE(search_time) >= DATE_SUB(NOW(), INTERVAL 30 DAY) GROUP BY keyword ORDER BY cnt DESC limit 5";



$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);


//3
  //f
  $sql3_1 = "SELECT keyword ,COUNT(*) as cnt
             FROM Search INNER JOIN User ON Search.user_id = User.user_id
             Where sex = 'F' GROUP BY keyword ORDER BY cnt DESC limit 3";
  //m
  $sql3_2 = "SELECT keyword ,COUNT(*) as cnt
             FROM Search INNER JOIN User ON Search.user_id = User.user_id
             Where sex = 'M' GROUP BY keyword ORDER BY cnt DESC limit 3";

//4
  //10
  $sql4_1 = "SELECT keyword ,COUNT(*) as cnt
             FROM Search INNER JOIN User ON Search.user_id = User.user_id
             Where birth between '2000-01-01' and '2010-01-01' GROUP BY keyword
             ORDER BY cnt DESC limit 3";
  //20
  $sql4_2 = "SELECT keyword ,COUNT(*) as cnt
             FROM Search INNER JOIN User ON Search.user_id = User.user_id
             Where birth between '1990-01-01' and '2000-01-01' GROUP BY keyword
             ORDER BY cnt DESC limit 3";
  //30
  $sql4_3 = "SELECT keyword ,COUNT(*) as cnt
             FROM Search INNER JOIN User ON Search.user_id = User.user_id
             Where birth between '1980-01-01' and '1990-01-01' GROUP BY keyword
             ORDER BY cnt DESC limit 3";
  //40
  $sql4_4 = "SELECT keyword ,COUNT(*) as cnt
             FROM Search INNER JOIN User ON Search.user_id = User.user_id
             Where birth between '1970-01-01' and '1980-01-01' GROUP BY keyword
             ORDER BY cnt DESC limit 3";


   $result3_1 = mysqli_query($conn, $sql3_1);
   $result3_2 = mysqli_query($conn, $sql3_2);
   $result4_1 = mysqli_query($conn, $sql4_1);
   $result4_2 = mysqli_query($conn, $sql4_2);
   $result4_3 = mysqli_query($conn, $sql4_3);
   $result4_4 = mysqli_query($conn, $sql4_4);


   //3
   if($result3_1){
      $j=0;
      $record_count3_1 = mysqli_num_rows($result3_1);
      while($row3_1 = mysqli_fetch_object($result3_1)){
        $b[$j]=$row3_1->keyword;
        $j++;
      }
      mysqli_free_result($result3_1);
    }

     if($result3_2){
        $i=0;
        $record_count3_2 = mysqli_num_rows($result3_2);
        while($row3_2 = mysqli_fetch_object($result3_2)){
          $a[$i]=$row3_2->keyword;
          $i++;
        }
        mysqli_free_result($result3_2);
      }

      //4
      if($result4_1){
         $q=0;
         $record_count4_1 = mysqli_num_rows($result4_1);
         while($row4_1 = mysqli_fetch_object($result4_1)){
           $c[$q]=$row4_1->keyword;
           $q++;
         }
         mysqli_free_result($result4_1);
       }

       if($result4_2){
          $w=0;
          $record_count4_2 = mysqli_num_rows($result4_2);
          while($row4_2 = mysqli_fetch_object($result4_2)){
            $d[$w]=$row4_2->keyword;
            $w++;
          }
          mysqli_free_result($result4_2);
        }

        if($result4_3){
           $s=0;
           $record_count4_3 = mysqli_num_rows($result4_3);
           while($row4_3 = mysqli_fetch_object($result4_3)){
             $e[$s]=$row4_3->keyword;
             $s++;
           }
           mysqli_free_result($result4_3);
         }

         if($result4_4){
            $r=0;
            $record_count4_4 = mysqli_num_rows($result4_4);
            while($row4_4 = mysqli_fetch_object($result4_4)){
              $f[$r]=$row4_4->keyword;
              $r++;
            }
            mysqli_free_result($result4_4);
          }


?>

 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <head>
    <meta charset="utf-8">
  </head>

  <body>

    <?php if($result1){
       $m=0;
       $record_count = mysqli_num_rows($result1);
       while($row = mysqli_fetch_object($result1)){
         $d[$m]=$row->keyword;
         $m++;
       }
       mysqli_free_result($result1);
     }
     if($result2){
        $n=0;
        $record_count = mysqli_num_rows($result2);
        while($row = mysqli_fetch_object($result2)){
          $e[$n]=$row->keyword;
          $n++;
        }
        mysqli_free_result($result2);
      }
    if($result3){
       $i=0;
       $record_count = mysqli_num_rows($result3);
       while($row = mysqli_fetch_object($result3)){
         $a[$i]=$row->keyword;
         $i++;
       }
       mysqli_free_result($result3);
     }
     ?>


     <div class="container">
         <div class="popularity" stlye="float:left;">
           <ul id= "daily">
            <h4>Popular keyword(day) (5.11 standard)</h4>
              <div>1.&emsp;<a><?=$d[0]?></a></br></div>
              <div>2.&emsp;<a><?=$d[1]?></a></br></div>
              <div>3.&emsp;<a><?=$d[2]?></a></br></div>
              <div>4.&emsp;<a><?=$d[3]?></a></br></div>
              <div>5.&emsp;<a><?=$d[4]?></a></div>
           </ul>

           <ul id= "weekly">
             <h4>Popular keyword(week)</h4>

              <div>1.&emsp;<a><?=$e[0]?></a></br></div>
              <div>2.&emsp;<a><?=$e[1]?></a></br></div>
              <div>3.&emsp;<a><?=$e[2]?></a></br></div>
              <div>4.&emsp;<a><?=$e[3]?></a></br></div>
              <div>5.&emsp;<a><?=$e[4]?></a></div>

           </ul>

           <ul id= "monthly">
             <h4>Popular keyword(month)</h4>

              <div>1.&emsp;<a><?=$a[0]?></a></br></div>
              <div>2.&emsp;<a><?=$a[1]?></a></br></div>
              <div>3.&emsp;<a><?=$a[2]?></a></br></div>
              <div>4.&emsp;<a><?=$a[3]?></a></br></div>
              <div>5.&emsp;<a><?=$a[4]?></a></div>

           </ul>
         </div>

    <h4>Search rank by gender</h4>
    <ol>
      Female
      <div><a class="t">1: &emsp; <?=$b[0]?></a></div>
      <div><a class="t">2: &emsp;<?=$b[1]?></a></div>
      <div><a class="t">3: &emsp;<?=$b[2]?></a></div>
      Male
      <div><a class="t">1: &emsp;<?=$a[0]?></a></div>
      <div><a class="t">2: &emsp;<?=$a[1]?></a></div>
      <div><a class="t">3: &emsp;<?=$a[2]?></a></div>
    </ol>


    <!-- <button class="btn news update" style="height:30px;"id="update">갱신 <i class="udt"></i></button> -->
    <h4>Search rank by age </h4>
    <ol>
      10
      <div><a class="t">1: &emsp; <?=$c[0]?></a></div>
      <div><a class="t">2: &emsp;<?=$c[1]?></a></div>
      <div><a class="t">3: &emsp;<?=$c[2]?></a></div>

      20
      <div><a class="t">1: &emsp; <?=$d[0]?></a></div>
      <div><a class="t">2: &emsp;<?=$d[1]?></a></div>
      <div><a class="t">3: &emsp;<?=$d[2]?></a></div>

      30
      <div><a class="t">1: &emsp; <?=$e[0]?></a></div>
      <div><a class="t">2: &emsp;<?=$e[1]?></a></div>
      <div><a class="t">3: &emsp;<?=$e[2]?></a></div>

      40
      <div><a class="t">1: &emsp; <?=$f[0]?></a></div>
      <div><a class="t">2: &emsp;<?=$f[1]?></a></div>
      <div><a class="t">3: &emsp;<?=$f[2]?></a></div>
    </ol>

       <!-- <button class="btn news update" style="height:30px;"id="update">갱신 <i class="udt"></i></button> -->
     </div>
  </body>

</html>

<?php
 
 mysqli_close($conn);
?>
