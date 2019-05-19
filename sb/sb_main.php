<?php
  $conn = mysqli_connect(
    "localhost",
    "thskan2002",
    "qwer1590",
    "thskan2002");
  $conn->set_charset("utf8");


//2
//최근 검색어 보여주기
  $sql2_1 = "SELECT keyword FROM Search Where user_id = '22' ORDER BY search_time DESC limit 5";
  //검색어 삭제하기
  $sql2_2 = "UPDATE Search SET is_exist = '0' Where user_id = '22' ORDER BY search_time DESC limit 1";
  //삭제한 검색어는 보여주지 않음
  $sql2_3 = "SELECT keyword FROM Search Where user_id = '22' and is_exist = '1' ORDER BY search_time DESC limit 5";
  $sql3= "SELECT title as ttt from Doc
  INNER JOIN Star
  ON Doc.title LIKE CONCAT('%',Star.keyword,'%')";

  $sql4="SELECT title as t3, launch as l3, hold_date as h3 from event
  INNER JOIN Star
  ON event.title LIKE CONCAT('%',Star.keyword,'%')";

  $result2_1 = mysqli_query($conn, $sql2_1);
  $result3 = mysqli_query($conn, $sql3);
  $result4 = mysqli_query($conn, $sql4);

//2
  if($result2_1){
     $j=0;
     $record_count2_1 = mysqli_num_rows($result2_1);
     while($row2_1 = mysqli_fetch_object($result2_1)){
       $sl[$j]=$row2_1->keyword;
       $j++;
     }
     mysqli_free_result($result2_1);
   }
  mysqli_query($conn, $sql2_2);
  $result2_3 = mysqli_query($conn, $sql2_3);
  if($result2_3){
     $j=0;
     $record_count2_3 = mysqli_num_rows($result2_3);
     while($row2_3 = mysqli_fetch_object($result2_3)){
       $sli[$j]=$row2_3->keyword;
       $j++;
     }
     mysqli_free_result($result2_3);
   }

   if($result3){
      $i=0;
      $record_count = mysqli_num_rows($result3);
      while($row = mysqli_fetch_object($result3)){
        $a[$i]=$row->ttt;
        $i++;
      }
      mysqli_free_result($result3);
    }

    if($result4){
       $p=0;
       $pp=0;
       $q=0;
       $record_count = mysqli_num_rows($result4);
       while($row = mysqli_fetch_object($result4)){
         $c[$p]=$row->t3;
         $cc[$pp]=$row->l3;
         $dd[$q]=$row->h3;
         $p++;
         $pp++;
         $q++;
       }
       mysqli_free_result($result4);
     }


?>

<!doctype html>
<html>

  <div class="container">
    <br/>
      <h4>star keyword of User 1 (add and delete) </h4>
      <ol>
        <div class="col-md-3">
        	<input type="text" class="m-1" id="SearchInput" name="searchValue" placeholder="Enter the keyword.">
        </div>
        <button type="button" class="btn btn-primary" onclick="star_add()" data-dismiss="modal">추가</button>
        <button type="button" class="btn btn-danger" onclick="star_delete()" data-dismiss="modal">삭제</button>
        <div id="show_star">

        </div>
      </ol>

      <h4>The most recent addition document about User 1's star keywords</h4>
      <ol>
        <button type="button" class="btn btn-danger" onclick="star_show()" data-dismiss="modal">Update</button>

        <div id="show_data">

        </div>
      </ol>
      <div class="daily" stlye="float:left;">
        <ul id= "word">
           <h4>Similar data related to the star keyword</h4>

            <div>1.&emsp;<a><?=$a[0]?></a></br></div>
            <div>2.&emsp;<a><?=$a[1]?></a></br></div>
            <div>3.&emsp;<a><?=$a[2]?></a></br></div>
            <div>4.&emsp;<a><?=$a[3]?></a></br></div>
            <div>5.&emsp;<a><?=$a[4]?></a></div>

         </ul>
       </div>

       <div class="daily" stlye="float:left;">
         <ul id= "word">
            <h4>Similar event related to the star keyword</h4>

            <div>1.&emsp;<?=$c[0]?>&emsp;(<?=$cc[0]?>)&emsp;<?=$dd[0]?></br></div>
            <div>2.&emsp;<?=$c[1]?>&emsp;(<?=$cc[1]?>)&emsp;<?=$dd[1]?></a></br></div>
            <div>3.&emsp;<?=$c[2]?>&emsp;(<?=$cc[2]?>)&emsp;<?=$dd[2]?></a></br></div>
            <div>4.&emsp;<?=$c[3]?>&emsp;(<?=$cc[3]?>)&emsp;<?=$dd[3]?></a></br></div>
            <div>5.&emsp;<?=$c[4]?>&emsp;(<?=$cc[4]?>)&emsp;<?=$dd[4]?></a></div>


          </ul>
        </div>

      <h4>Keywords searched by 'User 22'</h4>
      <ol>
        <?php
          	for($i=0; $i<$record_count2_1; $i=$i+1)
          	{
          		echo ($i+1). ": &emsp;";
              echo $sl[$i]."<br />";
          	}
          ?>
      </ol>


      <h4>Keywords searched by 'User 22' (after deleting the latest keyword)</h4>
      <ol>
        <?php
          	for($i=0; $i<$record_count2_3; $i=$i+1)
          	{
          		echo ($i+1). ": &emsp;";
              echo $sli[$i]."<br />";
          	}
          ?>
      </ol>

      <h4> Interest field add/update/delete </h4>
      <ol>
      <div class="col-md-3">
        <input type="text" class="m-1" id="InterestInput" name="searchValue" placeholder="Enter the keyword.">
      </div>
      <button type="button" class="btn btn-primary" onclick="interest_add()" data-dismiss="modal">추가/수정</button>
      <button type="button" class="btn btn-danger" onclick="interest_delete()" data-dismiss="modal">삭제</button>
      <div id="interest">

      </div>
      </ol>


  </div>
</html>

<script type="text/javascript">

<?php require_once('interest_list.js'); ?>
  interest_add();
  interest_delete();

<?php require_once('star_list.js'); ?>
  star_add();
  star_delete();
  star_show();

</script>
