<?php
require_once 'header.php';
$sql_authors = "SELECT id, name FROM authors";
$result_authors = $conn->query($sql_authors);

$sql_categories = "SELECT id, category FROM categories";
$result_categories = $conn->query($sql_categories);


$sql_publishers = "SELECT id, publisher FROM publishers";
$result_publishers = $conn->query($sql_publishers);

/* $message_val = "";
$mess_result_fail = "";
$mess_result_success = "";
if(isset($_POST['submit'])) {
    if(!empty($_POST['isbn']) && !empty($_POST['title']) && !empty($_POST['author']) && 
    !empty($_POST['category']) && !empty($_POST['price']) && !empty($_POST['publisher']))
    {
       
  
     if (!$result) {
         $mess_result_fail = "Неуспешно добавяне на книга.";
     } else {
         
        header("refresh:3;url=add-book.php"); ?>
        <p style="font-size: 40px; text-align: center; padding: 100px 0;">
        <?php echo 'Успешно добавяне на книга.                                                                                                                                                                                                  '; ?> </p> <?php
        exit;        
     }

}   else {
        $message_val = "Моля, попълнете нужните полета.";
  }
    
 } */
 
 

?>
<style>
    
    <?php include 'assets/libs/css/secondcss.css' ?> 
    <?php include 'assets/libs/css/drop.css' ?>
   <?php include 'assets/libs/css/sidebst.css' ?>
   #myInfos .addbook {
  background-color: lightgray;
}
    </style>

<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card">
             <h5 class="card-header">Добавяне на книга</h5>
        <div class="card-body">
            <form action="add-book.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="col-12">
                    <label for="isbn">ISBN *</label>
                    <input type="text" class="form-control required" id="isbn" name="isbn" required>
                    </div>

                    <div class="col-12">
                    <label for="title">Заглавие *</label>
                    <input type="text" class="form-control required" id="title" name="title" required>
                    </div>

                    <div class="col-12">
                    <label for="author">Автор *</label>
                    <select class="form-control" id="author" name="author">
                    <?php
                    if($result_authors->num_rows > 0) {
                        while ($row = $result_authors->fetch_assoc()) { 
                            ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                    </select>
                    </div>

                    <div class="col-12">
                    <label for="category">Категория</label>
                    <select class="form-control" id="category" name="category">
                    <?php
                    if($result_categories->num_rows > 0) {
                        while ($row = $result_categories->fetch_assoc()) { 
                            ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['category'] ?></option>
                    <?php
                        }
                    }
                    ?>
                    </select>
                    </div>

                    <div class="col-12">
                    <label for="year">Година</label>
                    <input type="text" class="form-control" id="year" name="year">
                    </div>

                    <div class="col-12">
                    <label for="description">Описание</label>
                    <textarea type="text" class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="col-12">
                    <label class="form-label" for="cover">Добавяне на снимка</label>
                    <input type="file" class="form-control" id="cover" name="cover" accept="image/*"/>
                    </div>

                    <div class="col-12">
                    <label for="lang">Език</label>
                    <input type="text" class="form-control" id="lang" name="lang">
                    </div>

                    <div class="col-12">
                    <label for="price">Цена *</label>
                    <input type="number" class="form-control required" id="price" name="price" required>
                    </div>

                    <div class="col-12">
                    <label for="publisher">Издател</label>
                    <select class="form-control" id="publisher" name="publisher">
                    <?php
                    if($result_publishers->num_rows > 0) {
                        while ($row = $result_publishers->fetch_assoc()) { 
                            ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['publisher'] ?></option>
                    <?php
                        }
                    }
                    ?>
                    </select>
                    </div>

                    </div>

                    <div class="form-row mt-4">
                        <div class="col-12">
                            <input type="submit" id="btn-save" class="btn btn-primary" name="submit" value="Добавяне"> 
                            <p id="success" style="padding-top: 10px; color: green;"></p>
                            <p id="warning" style="padding-top: 10px; color: red;"></p>
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
$("#btn-save").unbind().bind("click", function(e) {
    e.preventDefault();
    var isbn = $('#isbn').val();
    var title = $('#title').val();
    var author = $('#author').val();
    var category = $('#category').val();
    var year = $('#year').val();
    var description = $('#description').val();
    var cover = $('#cover').val();
    var lang = $('#lang').val();
    var price = $('#price').val();
    var publisher = $('#publisher').val();

    var form = $('form')[0];
    var formData = new FormData(form);
    formData.append('cover', $('input[type=file]')[0].files[0]);

    if(isbn != "" && title != "" && category != "" && price != "") {
        $.ajax({
            type: 'POST',
            data: formData,
         /*   data: {
                isbn: isbn,
                title: title,
                author: author,
                category: category,
                year: year,
                description: description,
                cover: cover,
                lang: lang,
                price: price,
                publisher: publisher,
            }, */
            cache: false, 
            processData: false,
            contentType: false,
            url: 'includes/book/create.php', 
            success: function(dataResult) {
               var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode == 200) {
                    $('#warning').hide();
                    $('form').trigger('reset');
                    $('#success').html('Книгата е добавена успешно.');
                } else if(dataResult.statusCode == 201 && dataResult.flag != "") {
                    switch (dataResult.flag) {
                        case 1: 
                            $('#warning').html('Разширението на файла трябва да бъде .jpg, .jpeg или .png.');
                            break;
                        case 2: 
                            $('#warning').html('Файлът е твърде голям.');
                            break;
                        case 3:
                            $('#warning').html('Файлът не е качен.');
                            break;
                    }
                } else {
                    alert("Error");
                } 
            } 
        });
    } else {
        $('form').addClass('validate');
     }

});
});
</script>