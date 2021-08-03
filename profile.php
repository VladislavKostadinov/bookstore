
<?php 

require_once 'header.php';
require_once 'includes/dbconnect.php';


if (isset($_SESSION['login_user'])) {
$id= $_SESSION['login_user'];
$query= "SELECT * FROM users where users.username='$id'";
$result = $conn->query($query);
 if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
$cusid = $row['id'];
 }
$querys= "SELECT * FROM orders where orders.customer_id='$cusid'";
$results = $conn->query($querys);



  ?> 
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- Jquery -->
<script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


 

    <?php}?>
  <h1 style="font-family: 'MedievalSharp', cursive !important; color: blue;">Вашият профил</h1>
  
<!------ Include the above in your HEAD tag ---------->

 
<div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Вашите данни</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Потребителско име</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="<?php echo $row['username'];?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email адрес</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="<?php echo $row['email'];?>"readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Дата на регистрация</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="<?php echo $row['registered'];?>"readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <a href="changepass.php" class="btn btn-info" style="margin-top:24px;">Сменете Вашата парола</a>
                    </div>
                  </div>
                </form>
                </div>

                
            <h6 class="heading-small text-muted mb-4" style="margin-top: 50px;">История на поръчките</h6>

    
    <table class="table table-sm tsm">
  <thead class="thead-light">
    <tr>
      <th style="width:25%;" scope="col">Дата на поръчката</th>
      <th scope="col">Информация за поръчката</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if($results->num_rows > 0) {
      while($row = $results->fetch_assoc()){ 
          $order = json_decode($row['book_isbn']);
          
          ?>
    <tr>
      <td scope="row"><?php echo htmlspecialchars($row['purchase_date']); ?></td>
      <td><?php foreach($order as $item) {
         echo 'Заглавие: ' . $item->name; 
         echo '; Количество: ' . $item->quantity; 
         echo '; Цена: ' . $item->price . ' лв.';         ;
         echo '; Общо: ' . $item->all . ' лв.';

        echo "<br>";
      } ?></td>

    </tr>
    <?php
      }
  }
  ?>



<script> 


</script>
<?php } else {
    echo '<h4>Не сте влезли в профила си! Можете да влезете от <a href="login.php">тук</a></h4>';
    
} ?>
<style>
    <?php include 'assets/libs/css/secondcss.css' ?> <?php include 'assets/libs/css/drop.css' ?>
   <?php include 'assets/libs/css/sidebst.css' ?>
 

    </style>