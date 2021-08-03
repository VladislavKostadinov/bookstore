<?php 
require_once 'header.php';

?>
<style>
    <?php include 'assets/libs/css/secondcss.css' ?> <?php include 'assets/libs/css/drop.css' ?>
   <?php include 'assets/libs/css/sidebst.css' ?>
   #myInfos .addpublisher {
  background-color: lightgray;
}
    </style>
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card">
             <h5 class="card-header">Добавяне на издател</h5>
        <div class="card-body">
            <form action="add-publisher.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="col-12">
                    <label for="publisher">Издател *</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" required>
                    </div>


                    <div class="col-12">
                    <label for="created_at">Дата на добавяне *</label>
                    <input type="datetime-local" class="form-control" id="created_at" name="created_at">
                    </div>


                    <div class="form-row mt-4">
                        <div class="col-12">
                            <input type="submit" id="btn-save" class="btn btn-primary" name="submit" value="Добавяне"> 
                            <p id="success"></p>
                        </div>
                    </div>
                    
            </form>
        </div>
</div>
        </div>
    </div>
</div>
<?php
$conn->close(); ?>

<script> 
$(document).ready(function () {
    $('#btn-save').unbind().bind("click", function(e){
        e.preventDefault();
        var publisher = $('#publisher').val();
        var created_at = $('#created_at').val();

        if (publisher != "" && created_at != "") {
            $.ajax({
                type: 'POST',
                data: {
                    publisher: publisher,
                    created_at: created_at,
                },
                cache: false,
                url: 'includes/publisher/create.php',
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);

                    if(dataResult.statusCode == 200) {
                        $('#success').html('Издателят е добавен успешно.')
                    } else {
                        alert('Eror')
                    }
                }
            });
        } else {
            $('form').addClass('validate');
        }
    });
});
</script>