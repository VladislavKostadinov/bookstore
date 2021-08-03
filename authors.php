
<?php 
require_once 'header.php';


$query = "SELECT authors.*, GROUP_CONCAT(DISTINCT books.title SEPARATOR ', ') as title FROM authors INNER JOIN books ON books.author_id = authors.id GROUP BY authors.id ORDER BY GROUP_CONCAT(DISTINCT books.title) ASC";
$result = $conn->query($query);

if(!$result) die("Fatal error");
echo "<br>";


?>


<style>
 <?php include 'assets/libs/css/style.css' ?>
 <?php include 'assets/libs/css/sidebst.css' ?>
 .authors {
  background: linear-gradient(to right, #c3e998, #3a551e) !important;   
}
    </style>
<table class="table table-bordered border-primary caption-top">
  <caption>Автори и книги</caption>
  <thead>
    <tr>
      <th scope="col">Име</th>
      <th scope="col">Биография</th>
      <th scope="col">Заглавия</th>
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
      <td scope="row"><?php echo htmlspecialchars($row['name']); ?></th>
      <td><?php echo htmlspecialchars($row['bio']); ?></td>
      <td><?php echo htmlspecialchars($row['title']); ?></td>
      <td style="width: 130px"><?php echo date("d.m.Y", strtotime($row['created_at'])); ?></td>
      <td>
      <a href="<?php echo URLBASE; ?>/view-author.php?id=<?php echo $row['id']; ?>" class="btn btn-sm">Преглед</a>
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