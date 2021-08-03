<?php 
require_once 'header.php';
?>

<style>
    <?php include 'assets/libs/css/secondcss.css' ?> <?php include 'assets/libs/css/drop.css' ?>
   <?php include 'assets/libs/css/sidebst.css' ?>
   
   #myInfos .addcategory {
    background-color: lightgray;
}


    </style>
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card">
             <h5 class="card-header">Добавяне на категория</h5>
        <div class="card-body">
            <form action="add-category.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="col-12">
                    <label for="category">Категория *</label>
                    <input type="text" class="form-control" id="category" name="category" required>
                    </div>

                    <div class="col-12">
                    <label for="description">Описание *</label>
                    <textarea type="text" class="form-control" id="description" name="description" required></textarea>
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
    $('#btn-save').unbind().bind("click", function(e) {
        e.preventDefault();
        var category = $('#category').val();
        var description = $('#description').val();
        var created_at = $('#created_at').val();

        if (category != "" && description != "" && created_at != "") {
            $.ajax({
                type: 'POST',
                data: {
                    category: category,
                    description: description,
                    created_at: created_at,
                },
                cache: false,
                url: 'includes/category/create.php',
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200) {
                        $('#success').html('Категорията е добавена успешно.')
                    } else {
                        alert('Error');
                    }
                }
            });
        } else {
            $('form').addClass('validate');
        }

    });


});

 </script>