<?php 
require_once 'header.php';
require_once 'includes/dbconnect.php';


$sql_sim = "SELECT books.*, authors.name, categories.category FROM ((books
INNER JOIN authors ON books.author_id = authors.id)
INNER JOIN categories on books.category_id = categories.id) WHERE categories.id ='2' LIMIT 4";

$result_sim = mysqli_query($conn, $sql_sim);

$sql_s = "SELECT books.*, authors.name, categories.category FROM ((books
INNER JOIN authors ON books.author_id = authors.id)
INNER JOIN categories on books.category_id = categories.id) WHERE categories.id !='2' LIMIT 4";

$result_s = mysqli_query($conn, $sql_s);

?>


<style>
    <?php include 'assets/libs/css/style.css' ?> 
 .simi-ps {
  font-family: 'MedievalSharp', cursive !important;
 }
 .lead {
  font-family: 'MedievalSharp', cursive !important;
  color: blue !important;
 }
 .simit {
   font-family: 'MedievalSharp', cursive !important;
 }

 .book-cs a:hover {
   color: brown;
 }

    </style>
    <head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap" rel="stylesheet">
</head>
     <div class="buttons">
 <button id="sidebarCollapse" onclick="openNav()" data-target="#mySidebar" data-toggle="collapse" type="button" id="show" class="openbtn btn btn-light rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Меню</small></button>
 <button id="sidebarCollapse" onclick="closeNav()" data-target="#mySidebar" data-toggle="collapse" style="display:none; margin-top:20px;" type="button" id="hide" class="closebtn btn btn-light rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-close mr-2"></i><small class="text-uppercase font-weight-bold">Меню</small></button>

</div>

    <div class="owl-carousel">
  <div> <img src="https://images.wallpaperscraft.com/image/house_fairy_tale_art_light_night_101615_1280x800.jpg"/> </div>
  <div> <img src="https://images.wallpaperscraft.com/image/mountains_clouds_sea_ship_sailboat_destroyed_69213_1280x800.jpg"/> </div>
  <div> <img src="https://images.wallpaperscraft.com/image/magic_ball_library_columns_castle_63093_1280x800.jpg"/> </div>
  <div> <img src="https://images.wallpaperscraft.com/image/jungle_fantasy_deer_butterflies_night_trees_102121_1280x800.jpg"/> </div>
  <div> <img src="https://images.wallpaperscraft.com/image/shark_dolphin_sea_130036_1280x800.jpg"/> </div>
  <div> <img src="https://images.wallpaperscraft.com/image/origami_ships_space_129546_1280x800.jpg"/> </div>
  <div> <img src="https://images.wallpaperscraft.com/image/clouds_mountains_art_127406_1280x800.jpg"/> </div>
</div>

 <!-- Toggle button -->
 <div class="wrapper">
  
<!-- Demo content -->
<h2 class="display-4" style="color: black;">Онлайн библиотека</h2>
<p class="lead mb-0">Открийте информация за любимите си книги и автори и преоткрийте нови.</p>

<div class="separator"></div>
<div class="row text-white"></div>
               <h4 class="simi-ps" style="font-family: 'Fantasies'; color:blue;">Модерно фентъзи</h4>




 <div class="book-cs"> 
<?php if (mysqli_num_rows($result_sim) > 0) {
while($row = mysqli_fetch_assoc($result_sim)) {
$img_src = $row['image'];
$title = $row['title'];
$price = $row['price'];
$author = $row['name'];

 ?>
              

      <div class="simit">
         <a class="simi-link" href="<?php echo URLBASE ?>/view-book.php?id=<?php echo $row['id']; echo $title ?>"/>
         <h5 class="book-simi-t"><?php echo $row['title']; ?></h5>
         <p class="book-simi-a"><b>Автор: </b><?php echo $author; ?><p>

         <img src="<?php echo IMG . $img_src; ?>" style="width:200px;height:280px;" class="img-responsive sim" /></a>
         </div> 
<?php 
}}
include_once 'footer.php';

?>

<div class="separator"></div>
<div class="row text-white"></div>
               <h4 class="simi-ps" style="color:blue;">Други издания</h4>


        </div>


 <div class="book-cs"> 
<?php if (mysqli_num_rows($result_s) > 0) {
while($row = mysqli_fetch_assoc($result_s)) {
$img_src = $row['image'];
$title = $row['title'];
$price = $row['price'];
$author = $row['name'];

 ?>
              

      <div class="simit">
         <a class="simi-link" href="<?php echo URLBASE ?>/view-book.php?id=<?php echo $row['id']; echo $title ?>"/>
         <h5 class="book-simi-t"><?php echo $row['title']; ?></h5>
         <p class="book-simi-a"><b>Автор: </b><?php echo $author; ?><p>

         <img src="<?php echo IMG . $img_src; ?>" style="width:200px;height:280px;" class="img-responsive sim" /></a>
         </div> 
<?php 
}}


?>

<script>
  
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("content").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("content").style.margin = "0 auto";
}

$('button').click(
    function(){
       $('button').toggle();
});


var owl = $('.owl-carousel');
owl.owlCarousel({
    items:3,
    loop:true,
    margin:0,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})

</script>