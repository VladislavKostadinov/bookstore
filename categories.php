<?php 
require_once 'header.php';


$query = "SELECT categories.*, GROUP_CONCAT(DISTINCT books.title SEPARATOR ', ') AS title FROM categories INNER JOIN books ON books.category_id = categories.id GROUP BY categories.id ORDER BY GROUP_CONCAT(DISTINCT books.title) ASC";

$result = $conn->query($query);

if(!$result) die("Fatal error");
echo "<br>";


?>


<style>
 <?php include 'assets/libs/css/style.css' ?>
 <?php include 'assets/libs/css/sidebst.css' ?>
 .categories {
  background: linear-gradient(to right, #c3e998, #3a551e) !important;   
}
    </style>
<table class="table table-bordered caption-top">
  <caption>Книги и жанрове</caption>
  <thead>
    <tr>
      <th scope="col" style="vertical-align: middle">Заглавия</th>
      <th scope="col" style="vertical-align: middle">Жанр</th>
      <th scope="col" style="vertical-align: middle">Описание</th>
      <th scope="col" style="vertical-align: middle; width: 130px">Създадена на</th>
      <th scope="col" style="vertical-align: middle">Действия</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){ 
          ?>
    <tr>
      <td scope="row"><?php echo htmlspecialchars($row['title']); ?></th>
      <td><?php echo htmlspecialchars($row['category']); ?></td>
      <td><?php echo htmlspecialchars($row['description']); ?></td>
      <td><?php echo date("d.m.Y", strtotime($row['created_at'])); ?></td>
      <td>
      <a href="<?php echo URLBASE; ?>/view-category.php?id=<?php echo $row['id']; ?>" class="btn btn-sm">Преглед</a>
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