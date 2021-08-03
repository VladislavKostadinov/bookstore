<?php 
require_once 'header.php';


$query = "SELECT publishers.*, GROUP_CONCAT(DISTINCT books.title SEPARATOR ', ') AS title, GROUP_CONCAT(DISTINCT authors.name SEPARATOR ', ') AS name FROM ((publishers INNER JOIN books ON books.publisher_id = publishers.id) 
                                                                           INNER JOIN authors ON books.author_id = authors.id) GROUP BY publishers.id ORDER BY GROUP_CONCAT(DISTINCT books.title) ASC";

$result = $conn->query($query);

if(!$result) die("Fatal error");
echo "<br>";


?>


<style>
 <?php include 'assets/libs/css/style.css' ?>
 <?php include 'assets/libs/css/sidebst.css' ?>
 .publishers {
  background: linear-gradient(to right, #c3e998, #3a551e) !important;   
}
    </style>
<table class="table table-striped table-hover">
  <caption>Книги и издатели</caption>
  <thead>
    <tr>
      <th scope="col" style="width: 300px">Заглавия</th>
      <th scope="col">Aвтор</th>
      <th scope="col">Издател</th>
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
      <td scope="row"><?php echo htmlspecialchars($row['title']); ?></th>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['publisher']); ?></td>
      <td><?php echo date("d.m.Y", strtotime($row['created_at'])); ?></td>
      <td>
      <a href="<?php echo URLBASE; ?>/view-publisher.php?id=<?php echo $row['id']; ?>" class="btn btn-sm">Преглед</a>
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