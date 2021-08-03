<?php
require_once "header.php";
$query = "SELECT books.*, authors.name FROM ((books
 INNER JOIN authors ON books.author_id = authors.id)
 INNER JOIN categories on books.category_id = categories.id) WHERE categories.id = '7'";

$result = $conn->query($query);

if(!$result) die("Fatal error");
echo "<br>";
?>

<style>
    <?php include 'assets/libs/css/secondcss.css' ?> <?php include 'assets/libs/css/drop.css' ?>
   <?php include 'assets/libs/css/sidebst.css' ?>
   #myInfos .philosophy {
    background: linear-gradient(to right, #c3e998, #3a551e) !important;  }
    </style>
<head> 
<script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>

</head>

<table class="table table-sm table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">ISBN</th>
      <th scope="col">Заглавие</th>
      <th scope="col">Автор</th>
      <th scope="col">Създадена на</th>
      <th scope="col">Действия</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){ 
          ?>
    <tr>
      <td scope="row"><?php echo htmlspecialchars($row['isbn']); ?></td>
      <td><?php echo htmlspecialchars($row['title']); ?></td>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo date("d.m.Y", strtotime($row['created_at'])); ?></td>
      <td>
      <a href="<?php echo URLBASE ?>/view-book.php?id=<?php echo $row['id']; ?>" class="btn btn-sm">Преглед</a>
      </td>
    </tr>
    <?php
      }
  }
  ?>
<?php
$result->close();
$conn->close();
?>
  </tbody>
</table>
