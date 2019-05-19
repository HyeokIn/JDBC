<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../../../wp-config.php');
  
  global $wpdb;
  $conn = mysqli_connect(
    "localhost",
    "thskan2002",
    "qwer1590",
    "thskan2002");
  $conn->set_charset("utf8");

  $sql5_1 = "SELECT south_word, north_word FROM Dictionary ";
  $result5_1 = mysqli_query($conn, $sql5_1);

  if($result5_1){
     $r=0;
     $record_count5_1 = mysqli_num_rows($result5_1);
     while($row5_1 = mysqli_fetch_object($result5_1)){
       $sth[$r]=$row5_1->south_word;
       $nth[$r]=$row5_1->north_word;
       $r++;
     }
     mysqli_free_result($result5_1);
   }

?>

<link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/dictionary/dictionary_main.css" />
<link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/sw_main.css" />






<div class="listWrapper">


  <div class="row justify-content-md-center">
    <div id="KUTitle" class="col-md-auto m-5">
    <h1>North Word Dictionary</h1>
  </div>
</div>

<div class="row">

<div class="col">

  <input type="text" class="m-1" id="SearchInput" name="searchValue" placeholder="Enter the keyword.">

  <button type="button" class="btn btn-danger m-1" name="button"  onclick="fetch_search_word()"><i class="fas fa-search"></i>&nbsp&nbspSearch</button>

</div>
</div>

<div class="row">
  <ul>
								            <li><a href="#" onclick="fetch_search_chosung('ㄱ'); return false;">ㄱ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㄴ'); return false;">ㄴ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㄷ'); return false;">ㄷ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㄹ'); return false;">ㄹ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅁ'); return false;">ㅁ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅂ'); return false;">ㅂ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅅ'); return false;">ㅅ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅇ'); return false;">ㅇ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅈ'); return false;">ㅈ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅊ'); return false;">ㅊ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅋ'); return false;">ㅋ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅌ'); return false;">ㅌ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅍ'); return false;">ㅍ</a></li>
	                        	<li><a href="#" onclick="fetch_search_chosung('ㅎ'); return false;">ㅎ</a></li>
							</ul>
</div>
<div id="item_data">


</div>

</div>

</ol>

<h4> South word -> North word convert   </h4>
<ol>
  <br />
  <?php
      for($i=0; $i<$record_count5_1; $i=$i+1)	{
        echo ($i+1). ": &emsp;";
        echo $sth[$i]." --> ";
        echo $nth[$i]. "<br />";
      }
    ?>
</ol>

<!-- Modal -->




<script type="text/javascript">
<?php require_once('dictionary_main.js'); ?>
</script>
