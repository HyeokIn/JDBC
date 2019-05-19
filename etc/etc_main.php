<?php
define('__ROOT__', dirname(dirname(__FILE__)));
//require_once(__ROOT__.'/item_list/add_list.php');
require_once('../inc/m-config.php');
// require_once('../../../wp-config.php');

// global $wpdb;
// $conn->set_charset("utf8");




$sql1 = "SELECT title ,law_id FROM law ORDER BY law_id limit 5";

$sql2 = "SELECT title as tl from Doc
ORDER BY
  case when category2='웹사이트' and title like '%통일%' then 1
     when category2='웹사이트' and title like '%북한%'  then 2
     else 3
     end ";

$sql3 = "SELECT title as tl from Doc WHERE (added_date) > DATE_SUB(NOW(),INTERVAL 4 hour) and emergency is not NULL";

$sql4 = "SELECT title as t FROM war ORDER BY binary(title) limit 5 ";





$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$result4 = mysqli_query($conn, $sql4);

?>

 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  <head>
    <meta charset="utf-8">
  </head>

  <body>

    <?php if($result1){
      $q=0;
      $record_count = mysqli_num_rows($result1);
      while($row = mysqli_fetch_object($result1)){
        $h[$q]=$row->title;
        $q++;
      }
      mysqli_free_result($result1);
    }
    if($result2){
      $ll=0;
      $record_count = mysqli_num_rows($result2);
      while($row = mysqli_fetch_object($result2)){
        $bb[$ll]=$row->tl;
        $ll++;
      }
      mysqli_free_result($result2);
    }
    if($result3){
      $z=0;
      $record_count = mysqli_num_rows($result3);
      while($row = mysqli_fetch_object($result3)){
        $y[$z]=$row->tl;
        $z++;
      }
      mysqli_free_result($result3);
    }
    if($result4){
      $r=0;
      $record_count = mysqli_num_rows($result4);
      while($row = mysqli_fetch_object($result4)){
        $ww[$r]=$row->t;
        $r++;
      }
      mysqli_free_result($result4);
    }

    ?>

    <div class="law" stlye="float:left;">
      <ul id="law">
        <h4>Unification Ministry decree</h4>
        <div>1.&emsp;<a><?=$h[0]?></a></br></div>
        <div>2.&emsp;<a><?=$h[1]?></a></br></div>
        <div>3.&emsp;<a><?=$h[2]?></a></br></div>
        <div>4.&emsp;<a><?=$h[3]?></a></br></div>
        <div>5.&emsp;<a><?=$h[4]?></a></div>
      </ul>

    </div>
    <div class="web" stlye="float:left;">
      <ul id="war">

        <h4>Related Site (order by unification,north,etc) </h4>
        <div>1.&emsp;<a><?=$bb[0]?></a></br></div>
        <div>2.&emsp;<a><?=$bb[1]?></a></br></div>
        <div>3.&emsp;<a><?=$bb[2]?></a></br></div>
        <div>4.&emsp;<a><?=$bb[3]?></a></br></div>
        <div>5.&emsp;<a><?=$bb[4]?></a></div>
      </ul>

    </div>
    <div class="emergency" stlye="float:left;">
      <ul id="news">

        <h4>News flash </h4>
        <div>1.&emsp;<a><?=$y[0]?></a></br></div>
        <div>2.&emsp;<a><?=$y[1]?></a></br></div>
        <div>3.&emsp;<a><?=$y[2]?></a></br></div>

      </ul>

    </div>
    <div class="war" stlye="float:left;">
      <ul id="war">
        <h4>Data related about 6.25 war </h4>
        <div>1.&emsp;<a><?=$ww[0]?></a></br></div>
        <div>2.&emsp;<a><?=$ww[1]?></a></br></div>
        <div>3.&emsp;<a><?=$ww[2]?></a></br></div>
        <div>4.&emsp;<a><?=$ww[3]?></a></br></div>
        <div>5.&emsp;<a><?=$ww[4]?></a></div>
      </ul>

    </div>



         </div>
      </body>

    </html>

    <?php
     
     mysqli_close($conn);
    ?>
