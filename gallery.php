<?php
require_once 'header.php';
?>

<head> 
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</head>

<style>
    <?php include 'assets/libs/css/gallery.css'?>
     <?php include 'assets/libs/css/style.css' ?>
     <?php include 'assets/libs/css/sidebst.css' ?>
     .gallery {
      background: linear-gradient(to right, #c3e998, #3a551e) !important;  }
   </style>



<div class="container">
	<div class="row">
		<div class="row">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Къща за гости по здрач"
                   data-image="https://images.wallpaperscraft.com/image/house_fairy_tale_art_light_night_101615_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/house_fairy_tale_art_light_night_101615_1280x800.jpg"
                         alt="House by the road at dusk">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Корабокрушенецът"
                   data-image="https://images.wallpaperscraft.com/image/mountains_clouds_sea_ship_sailboat_destroyed_69213_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/mountains_clouds_sea_ship_sailboat_destroyed_69213_1280x800.jpg"
                         alt="Shipwreck">
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Залата на знанието"
                   data-image="https://images.wallpaperscraft.com/image/magic_ball_library_columns_castle_63093_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/magic_ball_library_columns_castle_63093_1280x800.jpg"
                         alt="Library">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Дълбоко в дивото"
                   data-image="https://images.wallpaperscraft.com/image/jungle_fantasy_deer_butterflies_night_trees_102121_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/jungle_fantasy_deer_butterflies_night_trees_102121_1280x800.jpg"
                         alt="Tranquil forest">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Небе на мечтите"
                   data-image="https://images.wallpaperscraft.com/image/shark_dolphin_sea_130036_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/shark_dolphin_sea_130036_1280x800.jpg"
                         alt="Dream clouds">
                </a>
            </div>



            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Магия под звездите"
                   data-image="https://images.wallpaperscraft.com/image/origami_ships_space_129546_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/origami_ships_space_129546_1280x800.jpg"
                         alt="Night sky origami lake">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Планински водопад"
                   data-image="https://images.wallpaperscraft.com/image/clouds_mountains_art_127406_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/clouds_mountains_art_127406_1280x800.jpg"
                         alt="Mountain waterfall">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Градска светулка"
                   data-image="https://images.wallpaperscraft.com/image/poles_wires_art_140420_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/poles_wires_art_140420_1280x800.jpg"
                         alt="Street light">
                </a>
            </div>



            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Към простора"
                   data-image="https://images.wallpaperscraft.com/image/bicycle_trees_art_131605_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/bicycle_trees_art_131605_1280x800.jpg"
                         alt="Rocket blasting off in the distance">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Езерното градче"
                   data-image="https://images.wallpaperscraft.com/image/river_home_art_128746_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/river_home_art_128746_1280x800.jpg"
                         alt="Lake town">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="В търсене на обещаното"
                   data-image="https://images.wallpaperscraft.com/image/horses_art_night_129683_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/horses_art_night_129683_1280x800.jpg"
                         alt="Galloping horses">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Далече от дома"
                   data-image="https://images.wallpaperscraft.com/image/deer_mountains_art_142079_1280x800.jpg"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="https://images.wallpaperscraft.com/image/deer_mountains_art_142079_1280x800.jpg"
                         alt="Another planet">
                </a>
            </div>

        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="btn-close" data-dismiss="modal"><span aria-hidden="true"></span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<script>

let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

</script>