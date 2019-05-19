<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/item_list/add_list.php');
  require_once('../../../wp-config.php');
  //리스트 불러오기
  global $wpdb;
?>

<link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/sw_main.css" />







<div class="listWrapper">


  <div class="row justify-content-md-center">
    <div id="KUTitle" class="col-md-auto m-5">
    <h1>Broadcasting</h1>
  </div>
</div>

<div class="row justify-content-md-center">

  <input type="text" class="m-1" id="SearchInput" name="searchValue" placeholder="Enter the keyword.">

  <button type="button" class="btn btn-danger m-1" name="button"  onclick="fetch_search_data()"><i class="fas fa-search"></i>&nbsp&nbspSearch</button>


</div>

<div class="col">

  <button type="button" class="btn btn-primary m-1" name="button"  onclick="fetch_5859_data()">
    &nbsp&nbspProgram in 19.05.08 ~ 19.05.09
  </button>


</div>




<div id="item_data">


</div>


<script type="text/javascript">
<?php require_once('broadcasting_main.js'); ?>
  fetch_item_data();
</script>
