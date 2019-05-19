<!-- JQUERY CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<!-- Custom styles for this template -->



<?php
require_once('inc/m-config.php');

$step = $_POST['step'];
$isExpireFlag = false;

if($step == "0"){
  $get_url = "http://".$_SERVER['HTTP_HOST']."/wp-content/custom/login.php";
}
if($step == "" || $step == "1"){
  $step = 1;
  $get_url = "http://".$_SERVER['HTTP_HOST']."/wp-content/dbdbdb/manage.php";
}
?>

<?if($isExpireFlag == false){?>
  <script>
    $(document).ready(function(){
      $( "#m_result" ).load("<?=$get_url?>");
    });
  </script>
<?} ?>


		<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Korea Unification DB Search Engine</a>

				</div>
				<div id="navbar" class="nav navbar-nav navbar-right">

				</div>
			</div>

		</nav>


		<div  class="container-fluid" >
			<div class="row">

				<nav class="col-md-2 d-none d-md-block bg-light sidebar">
					<div class="sidebar-sticky">
						<ul class="nav flex-column">

						<li class="nav-item">
							<a id="sw" class="nav-link active" href=#>
								<i class="fas fa-edit"></i> Search

							</a>
						</li>

						
						<li class="nav-item">
							<a id="hi" class="nav-link active" href=#>
								<i class="fas fa-edit"></i> Statistic
							</a>
						</li>

            <li class="nav-item">
             <a id="sb" class="nav-link active" href=#>
               <i class="fas fa-edit"></i> Seungbin
             </a>
           </li>

           <li class="nav-item">
            <a id="user" class="nav-link active" href=#>
              <i class="fas fa-edit"></i> User
            </a>
          </li>

          <li class="nav-item">
           <a id="message" class="nav-link active" href=#>
             <i class="fas fa-edit"></i> Message
           </a>
         </li>

         <li class="nav-item">
          <a id="feedback" class="nav-link active" href=#>
            <i class="fas fa-edit"></i> Feedback
          </a>
         </li>

         <li class="nav-item">
          <a id="daily" class="nav-link active" href=#>
            <i class="fas fa-edit"></i> daily
          </a>
         </li>

         <li class="nav-item">
          <a id="dictionary" class="nav-link active" href=#>
            <i class="fas fa-edit"></i> Dictionary
          </a>
         </li>

         <li class="nav-item">
          <a id="broadcasting" class="nav-link active" href=#>
            <i class="fas fa-edit"></i> Broadcasting
          </a>
         </li>

         <li class="nav-item">
          <a id="event" class="nav-link active" href=#>
            <i class="fas fa-edit"></i> event
          </a>
         </li>

         <li class="nav-item">
          <a id="etc" class="nav-link active" href=#>
            <i class="fas fa-edit"></i> etc
          </a>
         </li>

						</ul>
					</div>
				</nav>





				<main role="main" class="col-md-10 col-lg-10 px-4">
						<div id="m_result" class="item_list">

						</div>
				</main>

			</div>
		</div>
		</div>


    <script>
	<?php require_once('index.js'); ?>
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
