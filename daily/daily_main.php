<?php
define('__ROOT__', dirname(dirname(__FILE__)));
//require_once(__ROOT__.'/item_list/add_list.php');
require_once('../inc/m-config.php');


$sql1 = "SELECT north_word as nw FROM Dictionary ORDER BY rand() limit 5";

$sql2 = "SELECT url as url FROM Image ORDER BY rand() limit 5";

$sql3 = "SELECT COUNT(added_date) as ct FROM Doc WHERE DATE(added_date)=DATE('2019-05-15')";



$sql4 = "SELECT title as tit from Doc WHERE create_date BETWEEN '2018-01-01' AND '2019-12-31'";

$sql5 = "SELECT title as tit2 from Doc WHERE create_date BETWEEN '2019-04-01' AND '2019-05-01'";

$sql6 = "SELECT DISTINCT score ,title FROM `Doc` WHERE score>20 order by score DESC limit 5";

$sql7 = "SELECT title as tt FROM Doc WHERE category2='뉴스' and title LIKE '%미사일%' ORDER BY rand() ";



$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$result4 = mysqli_query($conn, $sql4);
$result5 = mysqli_query($conn, $sql5);
$result6 = mysqli_query($conn, $sql6);
$result7 = mysqli_query($conn, $sql7);
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <head>
   <meta charset="utf-8">
 </head>

 <body>
     <?php if($result1){
        $i=0;
        $record_count = mysqli_num_rows($result1);
        while($row = mysqli_fetch_object($result1)){
          $a[$i]=$row->nw;
          $i++;
        }
        mysqli_free_result($result1);
      }

           if($result2){
             $p=0;
             $record_count = mysqli_num_rows($result2);
             while($row = mysqli_fetch_object($result2)){
               $f[$p]=$row->url;
               $p++;
             }
             mysqli_free_result($result2);
           }

           $row=mysqli_fetch_assoc($result3);
           $count = $row['ct'];

           if($result4){
             $rr=0;
             $record_count = mysqli_num_rows($result4);
             while($row = mysqli_fetch_object($result4)){
               $b[$rr]=$row->tit;
               $rr++;
             }
             mysqli_free_result($result4);
           }

           if($result5){
             $rrr=0;
             $record_count = mysqli_num_rows($result5);
             while($row = mysqli_fetch_object($result5)){
               $m[$rrr]=$row->tit2;
               $rrr++;
             }
             mysqli_free_result($result5);
           }

           if($result6){
             $kkk=0;
             $jjj=0;
             $record_count = mysqli_num_rows($result6);
             while($row = mysqli_fetch_object($result6)){
               $mm[$kkk]=$row->title;
               $nn[$jjj]=$row->score;
               $kkk++;
               $jjj++;
             }
             mysqli_free_result($result6);
           }

           if($result7){
             $j=0;
             $record_count = mysqli_num_rows($result7);
             while($row = mysqli_fetch_object($result7)){
               $b[$j]=$row->tt;
               $j++;
             }
             mysqli_free_result($result7);
           }


       ?>


       <div class="container">
         <div class="daily" stlye="float:left;">
           <ul id= "word">
              <h4>Today's word</h4>

               <div>1.&emsp;<a><?=$a[0]?></a></br></div>
               <div>2.&emsp;<a><?=$a[1]?></a></br></div>
               <div>3.&emsp;<a><?=$a[2]?></a></br></div>
               <div>4.&emsp;<a><?=$a[3]?></a></br></div>
               <div>5.&emsp;<a><?=$a[4]?></a></div>

            </ul>
          </div>
          <div class="photo" stlye="float:left;">
            <ul id="pic">
              <h4>Today's photp topic</h4>
              <div>1.&emsp;<a><?=$f[0]?></a></br></div>
              <div>2.&emsp;<a><?=$f[1]?></a></br></div>
              <div>3.&emsp;<a><?=$f[2]?></a></br></div>
              <div>4.&emsp;<a><?=$f[3]?></a></br></div>
              <div>5.&emsp;<a><?=$f[4]?></a></div>
            </ul>

          </div>
          <div class="data" stlye="float:left;">
            <ul id="pic">
              <h4>Today's uploaded data:<a><?php echo $count; ?></a>s</h4>
            </ul>
          </div>


          <div class="recent year" stlye="float:left;">
            <ul id="post">
              <h4>Data updated over the last year</h4>
              <div>1.&emsp;<a><?=$b[0]?></a></br></div>
              <div>2.&emsp;<a><?=$b[1]?></a></br></div>
              <div>3.&emsp;<a><?=$b[2]?></a></br></div>
              <div>4.&emsp;<a><?=$b[3]?></a></br></div>
              <div>5.&emsp;<a><?=$b[4]?></a></div>
            </ul>

          </div>

                    <div class="recent year" stlye="float:left;">
                      <ul id="post">
                        <h4>Data updated over the last month</h4>
                        <div>1.&emsp;<a><?=$m[0]?></a></br></div>
                        <div>2.&emsp;<a><?=$m[1]?></a></br></div>
                        <div>3.&emsp;<a><?=$m[2]?></a></br></div>
                        <div>4.&emsp;<a><?=$m[3]?></a></br></div>
                        <div>5.&emsp;<a><?=$m[4]?></a></div>
                      </ul>

                    </div>

                    <div class="news" stlye="float:left;">
                      <ul id= "headline">
                         <h4>Recent news about the security</h4>

                          <div>1.&emsp;<a><?=$b[0]?></a></br></div>
                          <div>2.&emsp;<a><?=$b[1]?></a></br></div>
                          <div>3.&emsp;<a><?=$b[2]?></a></br></div>

                       </ul>
                      </div>
          <div class="recent year" stlye="float:left;">
            <ul id="post">
                <h4>Reliable data list</h4>
                <div>1.&emsp;<a><?=$mm[0]?>&emsp;(<?=$nn[0]?>)</a></br></div>
                <div>2.&emsp;<a><?=$mm[1]?>&emsp;(<?=$nn[1]?>)</a></br></div>
                <div>3.&emsp;<a><?=$mm[2]?>&emsp;(<?=$nn[2]?>)</a></br></div>
                <div>4.&emsp;<a><?=$mm[3]?>&emsp;(<?=$nn[3]?>)</a></br></div>
                <div>5.&emsp;<a><?=$mm[4]?>&emsp;(<?=$nn[4]?>)</a></div>
            </ul>

          </div>


        </div>
     </body>

     </html>

     <?php
      
      mysqli_close($conn);
     ?>
