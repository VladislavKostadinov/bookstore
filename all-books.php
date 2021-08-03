<?php 
require_once 'header.php';


$query = "SELECT books.*, authors.name FROM books INNER JOIN authors ON books.author_id = authors.id";

$result = $conn->query($query);

if(!$result) die("Fatal error");
echo "<br>";

//$rows = $result->num_rows;

/*for($i=0; $i < $rows; $i++) {
    $result->data_seek($i);
    echo "ISBN: " . htmlspecialchars($result->fetch_assoc()['isbn']) . "<br>";
    $result->data_seek($i);
    echo "Title: " . htmlspecialchars($result->fetch_assoc()['title']) . "<br>";
    $result->data_seek($i);
    echo "Author ID: " . htmlspecialchars($result->fetch_assoc()['author_id']) . "<br>";
    $result->data_seek($i);
    echo "Price: " . htmlspecialchars($result->fetch_assoc()['price']) . "<br>";
}

$result->close();
$conn->close();*/
echo "<br>";

// for($i=0; $i < $rows; $i++) {
//     $row = $result->fetch_array(MYSQLI_ASSOC);
//     echo "<br>";

//     echo "ISBN: " . htmlspecialchars($row['isbn']) . "<br>";
//     echo "Title: " . htmlspecialchars($row['title']) . "<br>";
//     echo "Author ID: " . htmlspecialchars($row['author_id']) . "<br>";
//     echo "Price: " . htmlspecialchars($row['price']) . "<br>";
// }

?>


<style>
 <?php include 'assets/libs/css/style.css' ?>
 <?php include 'assets/libs/css/sidebst.css' ?>
.allbooks {
  background: linear-gradient(to right, #c3e998, #3a551e) !important;  }
    </style>
<table class="table table-sm">
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

