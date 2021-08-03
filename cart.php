<?php 

require_once "includes/dbconnect.php";
require_once "header.php";
error_reporting(0);

if(isset($_POST['add_to_cart']))
{
    if(isset($_SESSION['shopping_cart'])) 
    {
        $item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
        if(!in_array($_GET['id'], $item_array_id)) 
        {
            $count = count($_SESSION['shopping_cart']);
            $item_array = array(
                'item_id' => $_GET['id'],
                'item_name' => $_POST['hidden_name'],
                'item_price' => $_POST['hidden_price'],
                'hidden_isbn' => $_POST['hidden_isbn'],
                'item_quantity' => $_POST['quantity'],
                'item_final' => $_POST['item_final'],
                'hidden_customer' => $_POST['hidden_customer']


            );
            $_SESSION['shopping_cart'][$count] = $item_array;
            echo '<script>window.location="cart.php"</script>';

        }
        else 
        {
            echo '<script>alert("Книгата вече е добавена.")</script>';
            echo '<script>window.location="cart.php"</script>';

        }
    }
    else 
    {
        $item_array = array(
            'item_id' => $_GET['id'],
            'item_name' => $_POST['hidden_name'],
            'item_price' => $_POST['hidden_price'],
            'hidden_isbn' => $_POST['hidden_isbn'],
            'item_quantity' => $_POST['quantity'],
            'item_final' => $_POST['item_final'],
            'hidden_customer' => $_POST['hidden_customer']
        );

        $_SESSION['shopping_cart'][0] = $item_array;
    }
}

if(isset($_GET['action']))
{
    if($_GET['action'] == 'delete')
    {
        foreach($_SESSION['shopping_cart'] as $keys => $values)
        {
            if($values['item_id'] == $_GET['id'])
             {
                 unset($_SESSION['shopping_cart'][$keys]);
                 echo '<script>alert("Книгата е премахната от Кошницата.")</script>';
                 echo '<script>window.location="cart.php"</script>';

             }
        }
    }
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
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
    <?php include 'assets/libs/css/secondcss.css' ?> <?php include 'assets/libs/css/drop.css' ?>
   <?php include 'assets/libs/css/sidebst.css' ?>
 

    </style>
</head>
<div class="table-responsive">

<div class="container" style="width:700px;">
<h3 style="text-align:center;">Количка</h3><br>
<?php 
$query = "SELECT * FROM books ORDER BY id ASC";
$result = mysqli_query($conn, $query); 
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) 
    {

   $isbn = $row['isbn'];
   $customer = $_SESSION['login_user'];
    }
}
$query_id = "SELECT * FROM users WHERE username = '$customer'";
$result_id = mysqli_query($conn, $query_id); 
if(mysqli_num_rows($result_id) > 0) {
    while($row = mysqli_fetch_array($result_id)) 
    {
        
        $custome = $row['id'];
        

    }
}
?>

<div style="clear: both"></div>
<br>
<h3>Съдържание на Кошницата</h3>
<form action="cart.php" method="POST" enctype="multipart/form-data">

<table class="table table-bordered list-group">
<tr>
<th width="40%">Заглавие</th>
<th width="10%">Количество</th>
<th width="20%">Цена</th>
<th width="15%">Общо</th>
<th width="5%">Действие</th>
</tr>
<?php 
if(!empty($_SESSION['shopping_cart']))
{
    $i = 1;
    $total = 0;
    foreach($_SESSION['shopping_cart'] as $keys => $values) 
    {
        ?>
<tr id="list-group-item">
<td><input class="orders" id="item_name_<?php echo $i?>" name="item_name" value="<?php echo $values['item_name'];?>" readonly></input></td>
<td><input size='2' class="orders2" id="item_quantity_<?php echo $i?>" name="item_quantity" value="<?php echo $values['item_quantity']; ?>" readonly></td>
<td><input size='2' class="orders2" id="item_price_<?php echo $i?>" name="item_price" value="<?php echo $values['item_price']; ?> " readonly> лв.</td>
<td><input size='2' class="orders2" id="item_all_<?php echo $i?>" name="item_all" value="<?php echo number_format($values['item_quantity'] * $values['item_price'], 2); ?>" readonly> лв.</td>
<td><a href="cart.php?action=delete&id=<?php echo $values['item_id']; ?>"><span class="text-danger">Премахни</span></a></td>
<!-- <input type="hidden" id="hidden_isbn" name="hidden_isbn" value="<?php //echo $values['hidden_isbn']; ?>" /> -->
<input type="hidden" id="hidden_customer" name="hidden_customer" value="<?php echo $custome; ?>" />


</tr>
<?php
$total = $total + ($values['item_quantity'] * $values['item_price']);
 $i++;   } 
    ?>
    <tr>
    <td colspan="3" align="right">Общо</td>
    <td><input size='2' class="orders2" id="item_final" name="item_final" value="<?php echo number_format($total, 2); ?>" readonly> лв.</td>
    <td></td>
     </tr>

    <?php
}
?>
</table>

<div class="form-row mt-4">
<?php if(isset($_SESSION['login_user'])) {   ?>
    <div class="col-12">
    <input type="submit" id="order-finish" class="btn btn-primary" name="submit" value="Завърши поръчката"> 
    </div>
    <?php }?>

</form>
</div>
<p id="success" style="color: green; font-size: 30px;margin-top:100px;"></p>

</div>

<?php if(!isset($_SESSION['login_user'])) {   ?>
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="card">
             <h5 class="card-header">За да приключите поръчката въведете Вашите данни <?php 
      if(!isset($_SESSION['login_user'])) {   ?>
        <a class="logout" href="login.php">или влезте във Вашия профил</a></h5>
        <?php 
        } 
        ?>
        <div class="card-body">
            <form action="add-book.php" name="cart_form"  ng-app=""  method="POST" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="col-12">
                    <label for="guest_id">Име</label>
                    <input type="text" name="guest_id" class="form-control" id="guest_id" placeholder="Вашето име"/>                   
                 </div>
                    <div class="col-12">
                    <label for="email">E-mail</label>
                    <input type="email" ng-model="text" class="form-control" name="email" id="email" placeholder="Вашият e-mail"/>
                    <span id="hype" ng-show="cart_form.email.$error.email" style="color:red;">Невалиден e-mail.</span>   
                    </div>

                   

                    <div class="col-12">
                    <label for="phone">Телефонен номер</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон за връзка">
                    </div>

                    </div>

                    <div class="form-row mt-4">
                        <div class="col-12">
                            <input type="submit" id="btn-gu" class="btn btn-primary" name="submit" value="Завърши поръчката"> 
                        </div>
                    </div>

            </form>
            
        </div>
</div>
        </div>
    </div>
</div> 

<?php }?>


<script>
    <?php if(isset($_SESSION['login_user'])) {   ?>
$(document).ready(function () {
$("#order-finish").unbind().bind("click", function(e) {
    e.preventDefault();
    var item_name = $('#item_name').val();
    var item_quantity = $('#item_quantity').val();
    var item_price = $('#item_price').val();
    var item_all = $('#item_all').val();
    var item_final = $('#item_final').val();
    var hidden_customer = $('#hidden_customer').val();
    var line_items = {};

    var i = 1;
   $('.list-group #list-group-item').each(function () {
    line_items['row_' + i] = {
        name: $("#item_name_" + i).val(),
        quantity: $("#item_quantity_" + i).val(),
        price: $("#item_price_" + i).val(),
        all: $("#item_all_" + i).val(),
             }
                i++;
            });

    if (item_name != "") {
            $.ajax({
                type: 'POST',
                data: {
                    // item_name: item_name,
                    // item_quantity: item_quantity,
                    // item_price: item_price,
                    // item_all: item_all,
                    line_items: JSON.stringify(line_items),
                    // item_final: item_final,
                    hidden_customer: hidden_customer,
                },
                cache: false,
                url: 'includes/ordcart/orderfin.php',

                success: function(dataResult) {
                    console.log(dataResult);

                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200) {
                        $('#success').html('Поръчката Ви беше успешна. Благодаря Ви, че пазарувахте от нас.');
                        setTimeout(function() {
                        window.location.reload(true);
                        }, 3000);
                    } else {
                        alert('Error');
                    }
                }
            });
        } 

    });


});
<?php } else { ?>

$(document).ready(function () {
$("#btn-gu").unbind().bind("click", function(e) {
    e.preventDefault();
    var item_name = $('#item_name').val();
    var item_quantity = $('#item_quantity').val();
    var item_price = $('#item_price').val();
    var item_all = $('#item_all').val();
    var item_final = $('#item_final').val();
    var hidden_customer = $('#hidden_customer').val();
    var guest_id = $('#guest_id').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var line_items = {};

    var i = 1;
   $('.list-group #list-group-item').each(function () {
    line_items['row_' + i] = {
        name: $("#item_name_" + i).val(),
        quantity: $("#item_quantity_" + i).val(),
        price: $("#item_price_" + i).val(),
        all: $("#item_all_" + i).val(),
             }
                i++;
            });

    if (item_name != "") {
            $.ajax({
                type: 'POST',
                data: {
                    // item_name: item_name,
                    // item_quantity: item_quantity,
                    // item_price: item_price,
                    // item_all: item_all,
                    line_items: JSON.stringify(line_items),
                    // item_final: item_final,
                    guest_id: guest_id,
                    email: email,
                    phone: phone,
                },
                cache: false,
                url: 'includes/ordcart/orderguest.php',

                success: function(dataResult) {
                    console.log(dataResult);

                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode == 200) {
                        $('#success').html('Поръчката Ви беше успешна. Благодаря Ви, че пазарувахте от нас.');
                        setTimeout(function() {
                        window.location.reload(true);
                        }, 3000);
                    } else {
                        alert('Error');
                    }
                }
            });
        } 

    });


});
<?php } ?>

</script>



