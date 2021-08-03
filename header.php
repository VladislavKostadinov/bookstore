<?php

session_start();

require_once "includes/dbconnect.php";


define('URLBASE', 'http://book.local/');
define("IMG", "http://book.local/uploads/");
$resultt = "";

if(isset($_GET['submit'])){
?><script>window.location = "search-results.php?id=<?php echo $_GET['search'];?>";</script><?php
}


?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<!-- Bootstrap CSS -->

<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css"/>

<!-- Our CSS -->
<link rel="stylesheet" href="assets/libs/css/style.css"/>

<link rel="stylesheet" href="assets/libs/css/secondcss.css"/>


<!-- Bootstrap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- Jquery -->
<script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="assets/olwcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/olwcarousel/owl.theme.default.min.css">
<script src="assets/olwcarousel/owl.carousel.min.js"></script>
<style>
    <?php include 'assets/libs/css/secondcss.css' ?> 
#search:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px red;
  transition: 0.1s ease;
}

.spec {
 display:flex;
 flex-direction:row-reverse;
 flex-wrap:wrap;
 
}
#home:hover {
  color:lightgreen  !important;
}
#hom:hover {
  color: blue !important;
}

#show1:hover {
  color:white !important;
}


    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">

</head>



<div class="wrapper">
<body class="main">

<div style="margin-top: 50px;">
<div class="spec" style="margin:0 auto;">
<span style="float:right;margin-top: -25px;margin-right:10px;padding-bottom:0;height:15px;"class='badge badge-warning' id='lblCartCount'><?php echo getCartQty(); ?></span>
<a style="width:1px; padding:0; float:right;margin-top:-20px;" href="<?php echo URLBASE; ?>/cart.php" class="home nav-link text-dark font-italic">
<i class="fa fa-cart-arrow-down mr-3 fa-fw" id="cartstyle" style="font-size:32px;float:right;margin-top:1px;padding-bottom:20px;"> 
</i></a>


<a style="width:1px; float:right;padding:0;margin-top:-3px; margin-right: 32px;margin-left:41px;" href="<?php echo URLBASE; ?>/profile.php" class="home nav-link text-dark font-italic">
<i class="fa fa-user" id="prof" aria-hidden="true" style="font-size:24px;float:right; margin-right:26px;
margin-top:-10px;"></i></a>




<form id="sear" style="float:right; margin-right: 75px; margin-top: -45px;" action="" method="GET">
<div class="input-group">
<input id="search" name="search" type="text" placeholder="Въведете..." style="border-radius: 6.5px; margin-top:28px; 
height:32.5px; width: 300px;margin-right:5px;">
<input id="submit" name='submit' type="submit" value="Потърси" style="border-radius: 6.5px; font-size: 13px;">
</div>

</form>
</div>
<div ></div>

<!-- Vertical navbar -->

<div id="mySidebar" class="sidebar">
<div class="bg-white"> 
  <div id="nav-body"class="py-4 px-3 mb-4" style="border-bottom: 1px dotted blue; margin-bottom:0 !important;padding-left:10px !important;">
    <div class="media d-flex align-items-center">
      <a style="padding-left:0 !important;" href="<?php echo URLBASE; ?>"><img src="assets/img/lib4.jpg" alt="web library" width="75" class="mr-5 rounded-circle shadow-sm"></a>
      <div class="media-body">
      <?php 
      if(isset($_SESSION['login_user'])) {
     ?>
        <h6 class="m-0"><?php echo htmlspecialchars($_SESSION['login_user']); ?></h4>
        <a class="logout" href="includes/loggedout.php" style="margin-left:-32px;">Излизане</a> 
        <?php 
        } else { ?>
          <a style="padding-left: 16px !important" style=class="logout" href="login.php">Вписване</a> 

          <?php
        }
        ?>
      </div>
    </div>
  </div>
  

  <p id="nav-h" style="background: linear-gradient(to right, #599fd9, #c2e59c) !important; color: blue; 
  font-family: 'MedievalSharp', cursive !important;" class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Библиотека</p>

  <ul id="nav-body" class="nav flex-column mb-0">
    <div id="homep">
    <li class="nav-item" data-toggle="collapse">
      <a id="home" href="<?php echo URLBASE; ?>" class="home nav-link text-dark font-italic">
                <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                Начало
            </a>
    </li>
  </div>



    <div class="dropdown allow-focus"  id="myDropdown">
                <li class="nav-item" data-toggle="collapse">
      <a href="" id="show1" class="nav-link text-dark font-italic show" data-toggle="dropdown" onclick="dropDown(), dropDowns()">
                <i id="categ" class="fa fa-folder mr-3 text-primary fa-fw"></i>
                Всички книги
            </a>
    </li> 


    <div class="infos showo" id="myInfos">

    <li class="nav-item classic" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/classical-fantasy.php" id="classical" class="nav-link text-dark font-italic">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                 Класическо фентъзи
            </a>
    </li>
    <li class="nav-item modern" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/modern-fantasy.php" class="nav-link text-dark font-italic">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                Модерно фентъзи
            </a>
    </li>
    <li class="nav-item mrealism" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/magical-realism.php" class="nav-link text-dark font-italic">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                Магически реализъм
            </a>
    </li>
    <li class="nav-item fairytale" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/fairytale.php" class="nav-link text-dark font-italic">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                Приказки
            </a>
    </li> 
    <li class="nav-item adventures" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/adventures.php" class="nav-link text-dark font-italic">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                Приключенска фантастика
            </a>
    </li> 
    <li class="nav-item sci-fi" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/sci-fi.php" class="nav-link text-dark font-italic">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                Научна фантастика
            </a>
    </li> 
    <li class="nav-item philosophy" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/philosophy.php" class="nav-link text-dark font-italic">
                <i class="fa fa-book mr-3 text-primary fa-fw"></i>
                Съвременна философия
            </a>
    </li> 
</div>
</div>
<div class="stats" id="myStats">
    <li class="nav-item authors" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/authors.php" class="nav-link text-dark font-italic">
                <i class="fa fa-pencil mr-3 text-primary fa-fw"></i>
                Автори
            </a>
    </li>
    <li class="nav-item categories" data-toggle="collapse">
      <a id="hom" href="<?php echo URLBASE; ?>/categories.php" class="nav-link text-dark font-italic">
                <i class="fa fa-briefcase mr-3 text-primary fa-fw"></i>
                Категории
            </a>
    </li>
    <li class="nav-item publishers" data-toggle="collapse"">
      <a id="hom" href="<?php echo URLBASE; ?>/publishers.php" class="nav-link text-dark font-italic">
                <i class="fa fa-certificate mr-3 text-primary fa-fw"></i>
                Издатели
            </a>
                </li>

</div>



  
<div id="overlay"></div>
  </ul>

  <p style="background: linear-gradient(to right, #599fd9, #c2e59c) !important; color: blue; font-family: 'MedievalSharp', cursive !important;" class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Други</p>

  <ul id="nav-body" class="nav flex-column mb-0">
  <div class="stats" id="myStats">


  <li class="nav-item gallery">
      <a id="hom" href="<?php echo URLBASE; ?>/gallery.php" class="nav-link text-dark font-italic">
                <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                Галерия
            </a>
    </li>

    <li class="nav-item contacts">
      <a id="hom" href="<?php echo URLBASE; ?>/contacts.php" class="nav-link text-dark font-italic">
                <i class="fa fa-map-marker mr-3 text-primary fa-fw"></i>
                Контакти
            </a>
    </li>
    <div id="contact_pd"></div>
    <!-- <li class="nav-item">
      <a href="<?php echo URLBASE; ?>/register.php" class="nav-link text-dark font-italic">
                <i class="fa fa-user mr-3 text-primary fa-fw"></i>
                Регистрация
            </a>
    </li> -->
 

    <div>
  </ul>
</div>
</div></div></body></div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
 <script>
   function dropDown() {
     document.getElementById('myInfos').classList.toggle("show");
     
   }
   function dropDowns() {
     document.getElementById('myInfos').classList.toggle("showo");
     
   }


   window.onclick = function(e) {
     if (!e.target.matches('.show')) {
       var myInfos = document.getElementById('myInfos');
       if (myInfos.classList.contains('show')) {
         myInfos.classList.remove('show');

       }
     }
   }

   var url = location.href;

$('.infos').each(function() {
    var $dropdownmenu = $(this);
    $(this).find('li').each(function() {
        if( $(this).find('a').attr('href')== url ) {
            console.log( $dropdownmenu ); // this is your dropdown menu which you want to display
            console.log($($dropdownmenu).parents('li')); // this is the parent list item of the dropdown menu. Add collapse class or whatever that collapses its child list
        }
    });
});

   $('#books').click(function(){
    $('#show1').load('add-book.php');
 });

   $("#books").click(function(){
    $.ajax({url: "add-book.php", success: function(result){
        $("#books").html(result);
    }});
});

   $("#show1").on('click', function(e) {
    e.preventDefault();
    $("#Add").toggle(); //When clicked, toggle visibility.
});

$(window).on('hashchange', function() {
    //You can detect a hash change like this
    //Since your href is set to #popup,
    //you can put the .toggle() in here as the hash will change when clicked.
    console.log("yolo");
});
   if(window.location.hash == "#Add") {
    //If it is initialized with the hash #popup (ie. example.com#popup and Enter)
    //Use this
    console.log("yolo2");
    $("#Add").show();
}



 /* $(function () {
  $('.showo').click(function () { 
    $('.showo').load('http://book.local/);   
    return false;
    });

}); */

   $(document).ready(function() {
  $('#show1').click(function() {
    if ($('#categ').hasClass('fa-folder')) {
      $('#categ').removeClass('fa-folder');
      $('#categ').addClass('fa-folder-open');
    } else if ($('#categ').hasClass('fa-folder-open')) {
      $('#categ').removeClass('fa-folder-open');
      $('#categ').addClass('fa-folder');
    }
  });
});

<?php 
function getCartQty()
{
    # If there is nothing in the cart, return 0
    if(empty($_SESSION['shopping_cart']))
        return 0;
    # Store array
    $qty = array();
    # Loop items in cart
    foreach($_SESSION["shopping_cart"] as $item){
        # Store the quantity of each item
        $qty[] =  $item['item_quantity'];
    }
    # Return the sum
    return array_sum($qty);
}


?>

$(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});
 </script> 
</html>

