var docdoc;
var a;


$(document).ready(function(){
  $("#category").on('change', function(){
    var category = $(this).val();
  });
})

function fetch_search_data(){

  var category=document.getElementById("category");
  category = category.options[category.selectedIndex].text;
  var keyword = $("#SearchInput").val();


  var interest = $('#interestFirst:checked').val();
  console.log(interest);
  var latest = $('#orderbydate:checked').val();
  var alphabet = $('#orderbyalpha:checked').val();
  var rate = $('#orderbyrate:checked').val();
  var bestrate = $('#bestrate:checked').val();
  var imagesize = $('#imagesize:checked').val();
  var quality = $('#quality:checked').val();
  var duration = $('#duration:checked').val();


  if(category=="Choose"){
    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/fetch_search_list.php",
      type: "POST",
      data: {
        category:category,
        keyword:keyword,
        interest: interest,
        latest:latest,
        alphabet:alphabet,
        rate:rate,
        bestrate:bestrate
      },
      success: function(data) {
        $("#item_data").html(data);
      }
    });

  } else if(category=="Image"){
    console.log("Go to Image table");
    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/show_img_list.php",
      type: "POST",
      data: {
        //semester:semester,
        category:category,
        //subitem:subitem,
        //columnType:columnType,
        keyword:keyword,
        imagesize:imagesize
        //order:order
      },
      success: function(data) {
        $("#item_data").html(data);
      }
    });
  } else if(category=="Video"){
    console.log("Go to Video table");
    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/show_movie_list.php",
      type: "POST",
      data: {
        //semester:semester,
        category:category,
        //subitem:subitem,
        //columnType:columnType,
        keyword:keyword,
        quality:quality,
        duration:duration,
        //order:order
      },
      success: function(data) {
        $("#item_data").html(data);
      }
    });
  }
  else if(category=="Except"){
    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/show_except_list.php",
      type: "POST",
      data: {
        category:category,
        keyword:keyword,
        interest: interest,
        latest:latest,
        alphabet:alphabet,
        rate:rate,
        bestrate:bestrate
      },
      success: function(data) {
        $("#item_data").html(data);
      }
    });

  }

}

function setId(doc_id){

  a = doc_id;
  docdoc=a;
  console.log(docdoc);
}

function fetch_rate(){
  //var semester=$("#semesters").val();

  //var subitem=$("#subitem").val();
  //var columnType = $("#student").val
  var rate = $("#rate").val();
  var doc_id =docdoc;
  console.log(rate);
  console.log(doc_id);



    $.ajax({
      url:
        "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/fetch_rate.php",
      type: "POST",
      data: {
        //semester:semester,
        rate:rate,
        id:doc_id,
        //subitem:subitem,
        //columnType:columnType,
        //keyword:keyword,
        //order:order
      },
      success: function(data) {
        $("#item_data").html(data);

      }
    });
  }

  function fetch_category_best(box){
    //var semester=$("#semesters").val();

    //var subitem=$("#subitem").val();
    //var columnType = $("#student").val
var bestrate = $('#bestrate:checked').val();
if(box.checked==true){

  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/show_category_best.php",
    type: "POST",
    data: {
      //semester:semester,
        bestrate:bestrate
      //subitem:subitem,
      //columnType:columnType,
      //keyword:keyword,
      //order:order
    },
    success: function(data) {
      $("#item_data").html(data);

    }
  });
}
else{
  $.ajax({
    url:
      "http://<?=$_SERVER['HTTP_HOST']?>/wp-content/dbdbdb/sw/show_list.php",
    type: "POST",
    data: {
      //semester:semester,
      //bestrate:bestrate
      //subitem:subitem,
      //columnType:columnType,
      //keyword:keyword,
      //order:order
    },
    success: function(data) {
      $("#item_data").html(data);

    }
  });
}



    }
