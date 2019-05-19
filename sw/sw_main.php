<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../../../wp-config.php');
  require_once('../inc/m-config.php');
  //리스트 불러오기
  global $wpdb;

  $sql="SELECT keyword as word, COUNT(*) as cnt FROM Search GROUP BY keyword ORDER BY cnt DESC limit 10";
  //1. mySQL 占쏙옙占쏙옙(占쏙옙占쏙옙,id,pass)
  //2. DB占쏙옙占쏙옙
  $sql2="SELECT word_text as word2 FROM Words";

  //3. 占쏙옙占쏙옙

  //4. 占쏙옙占쏙옙占쏙옙占쏙옙

  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn, $sql2);
?>

<link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/sw_main.css" />
<?php if($result){
   $i=0;
   $record_count = mysqli_num_rows($result);
   while($row = mysqli_fetch_object($result)){
     $a[$i]=$row->word;
     $i++;
   }
   mysqli_free_result($result);
 }
 if($result2){
    $j=0;
    $record_count = mysqli_num_rows($result2);
    while($row = mysqli_fetch_object($result2)){
      $b[$j]=$row->word2;
      $j++;
    }
    mysqli_free_result($result2);
  }

 ?>
<script>
$(function() {
 var languages = <?= json_encode($b) ?>

 $( "#SearchInput" ).autocomplete({
   source:languages
 });

});
</script>



<style>
@import url(https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css);
.normal     { font-weight: 400 }
.bold       { font-weight: 700 }
.bolder     { font-weight: 800 }
.light      { font-weight: 300 }

html,body {
padding:0px;
margin:0px;
font-family: 'NanumSquare', sans-serif;
position:relative;
}
#wrap {
margin:0px;
padding:0px;
width:100%;
}
.container {
width:1240px;
margin:0 auto;
}
a,img {
border:0px;
text-decoration:none;
}
ul,li {
list-style:none;
padding:0px;
margin:0px;
}
h1 {
color:#525252;
font-size:40px;
font-weight:100;
text-align:center;
margin:0px;
margin-top:193px;
}
h1 > b {
font-weight:900;
}

#best_search {
width:740px;
margin:0 auto;
padding-top:50px;
text-align:center;
}
#best_search li,dd {
display:inline-block;
vertical-align:middle;
}
button {
width:121px;
background-color:#0085e2;
color:#fff;
border:0px;
height:63px;
margin-left:-5px;
padding:0px;
font-size:18px;
}
#best_search li p {
color:#393939;
font-size:17px;
font-weight:bold;
margin:0px;
padding-right:30px;
}
dd {
margin:0px;
}
dd  a.t{
cursor:pointer;
margin:0px;
color:#4b4b4b;
text-overflow:ellipsis;
overflow:hidden;
width:94px;
white-space:nowrap;
display:inline-block;
font-size:17px;
text-align:left;
padding-right:13px;
font-weight:700;
vertical-align:middle;
}
dd .num {
background-color:#4b4b4b;
color:#fff;
font-size:10px;
margin-right:10px;
vertical-align:middle;
width:18px;
height:18px;
float:left;
line-height:18px;
text-align:center;
}
.best_add {
border:1px solid #bebebe;
color:#4b4b4b;
padding:0px 4px;
margin-left:10px;
}
#my-language{
display: inline-block;
width: 20%;
height: 40%;
background-color: white;
border: 1px solid #6f96ba;
border-radius: 5px;
margin-top:5px;
}
#search_mileage{
margin-top:5px;
width:100px;
height:30px;
}
</style>

<div class="listWrapper">


  <div class="row justify-content-md-center">
    <div id="KUTitle" class="col-md-auto m-5">
    <h1>Korea Unification DB System</h1>
  </div>



</div>
<div id="wrap">
  <div class="container">
    <ul id="best_search">
      <li><p>인기검색어</p></li>
      <li>
        <dl class="time1" style="display:">
          <dd><a class="t" href="#"><div class="num">1</div><?=$a[0]?></a></dd>
          <dd><a class="t" href="#"><div class="num">2</div><?=$a[1]?></a></dd>
          <dd><a class="t" href="#"><div class="num">3</div><?=$a[2]?></a></dd>
          <dd><a class="t" href="#"><div class="num">4</div><?=$a[3]?></a></dd>
          <dd><a class="t" href="#"><div class="num">5</div><?=$a[4]?></a></dd>
        </dl>
        <dl class="time2" style="display:none;">
          <dd><a class="t" href="#"><div class="num">6</div><?=$a[5]?></a></dd>
          <dd><a class="t" href="#"><div class="num">7</div><?=$a[6]?></a></dd>
          <dd><a class="t" href="#"><div class="num">8</div><?=$a[7]?></a></dd>
          <dd><a class="t" href="#"><div class="num">9</div><?=$a[8]?></a></dd>
          <dd><a class="t" href="#"><div class="num">10</div><?=$a[9]?></a></dd>
        </dl>

      </li>
      <li>
        <a class="best_add ad1" style="cursor:pointer" onClick="javascript:view('0')">&#62;</a>
        <a class="best_add ad2" onClick="javascript:view('1')" style="display:none;cursor:pointer" >&#62;</a>
        <a class="best_add ad3" onClick="javascript:view('2')" style="display:none;cursor:pointer" >&#62;</a>
        <a class="best_add ad4" onClick="javascript:view('3')" style="display:none;cursor:pointer" >&#60;</a>
      </li>
    </ul>
  </div>
  </div>



<div class="row">

<div class="col">
  <select class="selectpicker" id="category" name="searchType">
    <option value="choose">Choose</option>
    <option value="sImage">Image</option>
    <option value="sVideo">Video</option>
    <option value="except">Except</option>
  </select>

  <input type="text" class="m-1" id="SearchInput" name="searchValue" placeholder="Enter the keyword.">

  <button type="button" class="btn btn-danger m-1" name="button"  onclick="fetch_search_data()"><i class="fas fa-search"></i>&nbsp&nbspSearch</button>
  <!-- Default unchecked -->

  <!-- Default inline 1-->
  <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="interestFirst" value="interest">
    <label class="custom-control-label" for="interestFirst">Interest First</label>
  </div>

  <!-- Default inline 2-->
  <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="orderbydate" value="latest">
    <label class="custom-control-label" for="orderbydate">Order by Latest</label>
  </div>

  <!-- Default inline 3-->
  <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="orderbyalpha" value="alpha">
    <label class="custom-control-label" for="orderbyalpha">Order by Alaphabet</label>
  </div>

  <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="orderbyrate" value="rate">
    <label class="custom-control-label" for="orderbyrate">Order by Rate</label>
  </div>

  <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="imagesize"  value="imagesize">
    <label class="custom-control-label" for="imagesize">Order by image size </label>
  </div>

  <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="quality"  value="quality">
    <label class="custom-control-label" for="quality">Order by Video quality </label>
  </div>

  <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="duration"  value="duration">
    <label class="custom-control-label" for="duration">Order by Video duration </label>
  </div>

  <div class="custom-control custom-checkbox custom-control-inline">
    <input type="checkbox" class="custom-control-input" id="bestRate" onclick="fetch_category_best(this)" value="">
    <label class="custom-control-label" for="bestRate">category best rate</label>
  </div>


</div>







    <!-- Default inline 1-->


</div>





<div id="item_data">

</div>


<!-- Modal -->
<div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rateModalLabel">Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	Points : <input type="text" class="studentListSearchInput ListSearchInput" id="rate" name="searchValue">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="fetch_rate();window.location.reload();" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>


<script>
function view(arg){
$(".time1, .time2, .ad1, .ad2").css("display","none");
if(arg=="0") {
 $(".time2, .ad2").css("display","block");
 viewcount = 1;
}
else if(arg=="1") {
 $(".time1, .ad1").css("display","block");
 viewcount = 0;
}
}
var viewcount = 0;
var rtcarousel = setInterval(function(){ view(viewcount) },3000);

$("#best_search").mouseenter(function() {
clearInterval(rtcarousel);
});

$("#best_search").mouseleave(function() {
rtcarousel = setInterval(function(){ view(viewcount) },5000);
});
</script>

<script type="text/javascript">
<?php require_once('sw_main.js'); ?>

$('body').on('hidden.bs.modal', '.modal', function () {
     $(this).removeData('bs.modal');
});
<?php require_once('js/show_list.js'); ?>
  fetch_item_data();

</script>
