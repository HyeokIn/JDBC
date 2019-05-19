<?php
define('__ROOT__', dirname(dirname(__FILE__)));
//require_once(__ROOT__.'/item_list/add_list.php');
require_once('../inc/m-config.php');

$sql1= "SELECT title as t, launch as l, hold_date as h From event order by hold_date asc limit 5";

$sql2= "SELECT title as t2, launch as l2,  hold_date as h2 From event
WHERE DATE(hold_date) >= DATE_SUB(NOW(), INTERVAL 7 DAY) ";




$sql4 = "SELECT COUNT(add_date) as ad FROM event WHERE DATE(add_date)=DATE(NOW())";


$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

$result4 = mysqli_query($conn, $sql4);
?>


<?php if($result1){
   $i=0;
   $ii=0;
   $j=0;
   $jj=0;

   $record_count = mysqli_num_rows($result1);

   while($row = mysqli_fetch_object($result1)){
     $a[$i]=$row->t;
     $aa[$ii]=$row->l;

     $bb[$jj]=$row->h;
     $i++;
     $ii++;
     $j++;
     $jj++;
   }
   mysqli_free_result($result1);
 }

 if($result2){
    $p=0;
    $pp=0;
    $q=0;
    $qq=0;

    $record_count = mysqli_num_rows($result2);
    while($row = mysqli_fetch_object($result2)){
      $c[$p]=$row->t2;
      $cc[$pp]=$row->l2;

      $dd[$qq]=$row->h2;
      $p++;
      $pp++;
      $q++;
      $qq++;
    }
    mysqli_free_result($result2);
  }


   $row=mysqli_fetch_assoc($result4);
   $count = $row['ad'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <head>
   <meta charset="utf-8">
 </head>

 <body>

   <div class="container">
     <div class="daily" stlye="float:left;">
       <ul id= "word">
          <h4>Events and Forums</h4>

           <div>1.&emsp;<?=$a[0]?>&emsp;(<?=$aa[0]?>)&emsp;<?=$bb[0]?></br></div>
           <div>2.&emsp;<?=$a[1]?>&emsp;(<?=$aa[1]?>)&emsp;<?=$bb[1]?></a></br></div>
           <div>3.&emsp;<?=$a[2]?>&emsp;(<?=$aa[2]?>)&emsp;<?=$bb[2]?></a></br></div>
           <div>4.&emsp;<?=$a[3]?>&emsp;(<?=$aa[3]?>)&emsp;<?=$bb[3]?></a></br></div>
           <div>5.&emsp;<?=$a[4]?>&emsp;(<?=$aa[4]?>)&emsp;<?=$bb[4]?></a></div>

        </ul>
      </div>

      <div class="container">
        <div class="daily" stlye="float:left;">
          <ul id= "word">
             <h4>Events and Forums this week </h4>

              <div>1.&emsp;<?=$c[0]?>&emsp;(<?=$cc[0]?>)&emsp;<?=$dd[0]?></a></br></div>
              <div>2.&emsp;<?=$c[1]?>&emsp;(<?=$cc[1]?>)&emsp;<?=$dd[1]?></a></br></div>
              <div>3.&emsp;<?=$c[2]?>&emsp;(<?=$cc[2]?>)&emsp;<?=$dd[2]?></a></br></div>
              <div>4.&emsp;<?=$c[3]?>&emsp;(<?=$cc[3]?>)&emsp;<?=$dd[3]?></a></br></div>
              <div>5.&emsp;<?=$c[4]?>&emsp;(<?=$cc[4]?>)&emsp;<?=$dd[4]?></a></div>

           </ul>
         </div>


            <div class="data" stlye="float:left;">
              <ul id="pic">
                <h4>Events uploaded today:<a><?php echo $count; ?></a>s</h4>
              </ul>
            </div>



    </div>
 </body>

 </html>

 <?php
  
  mysqli_close($conn);
 ?>
