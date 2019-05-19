<?php
define('__ROOT__', dirname(dirname(__FILE__)));
//require_once(__ROOT__.'/item_list/add_list.php');
require_once('../inc/m-config.php');
$sql="SELECT keyword as word, COUNT(*) as cnt FROM Search GROUP BY keyword ORDER BY cnt DESC limit 10";
//1. mySQL 占쏙옙占쏙옙(占쏙옙占쏙옙,id,pass)
//2. DB占쏙옙占쏙옙
$sql2="SELECT word_text as word2 FROM Words";

//3. 占쏙옙占쏙옙

//4. 占쏙옙占쏙옙占쏙옙占쏙옙

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);//select 占쏙옙占쏙옙占싹띰옙占쏙옙 占쏙옙占쏙옙占쏙옙 占쏙옙占쏙옙.
//5. resultSet or recordSet 처占쏙옙
//6. DB占쏙옙占쏙옙 占쏙옙占쏙옙


?>


 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
 <HTML>
   <head>
     <meta charset="utf-8">

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
   </head>
   <body>
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

   	$( "#my-language" ).autocomplete({
   		source:languages
   	});
   });
   </script>

   <input type="text" class="studentListSearchInput ListSearchInput" id="my-language" name="searchValue" placeholder="Enter the keyword.">
 </span>

 <button type="button" class="listbutton ListSearch" name="button" id="search_mileage" onclick="fetch_search_data()"><i class="fas fa-search"></i>&nbsp&nbspSearch</button>


    <div id="wrap">
   		<div class="container">
   			<ul id="best_search">
   				<li><p>Best Search</p></li>
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
     </body>
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
     <?php require_once('js/show_list.js'); ?>
       fetch_item_data();
     </script>
</html>
 <?php
 	// 占쏙옙占쏙옙 占쏙옙占쏙옙
 	mysqli_close($conn);
 ?>
