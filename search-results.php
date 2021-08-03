<?php 
require_once "includes/dbconnect.php";
require_once "header.php";
?>
<style>
<?php include 'assets/libs/css/secondcss.css'; ?> <?php include 'assets/libs/css/drop.css'; ?>
<?php include 'assets/libs/css/sidebst.css'; ?>
.result-list {
    color: brown;
    text-align: center;
    margin-bottom: 15px;
}

.result {
    color: blue;
    text-decoration: none;
    font-size: 20px;
}
.content-r {
    text-align: center;
}
a:hover {
    color: brown;
}
</style>
<?php
error_reporting(0);

$safe_value = $_GET['id'];

//check if id is empty
if($safe_value==''){
echo "Не сте задали критерий!";
exit;
}
$sql_books = "SELECT books.* FROM books 
WHERE books.title LIKE '%$safe_value%'";
$result_books = $conn->query($sql_books);
$sql_authors = "SELECT authors.*, books.* FROM authors INNER JOIN books ON authors.id = books.author_id WHERE authors.name LIKE '%$safe_value%'";
$result_authors = $conn->query($sql_authors);

$sql_publishers = "SELECT publishers.*, books.* FROM publishers INNER JOIN books ON publishers.id = books.publisher_id WHERE publishers.publisher LIKE '%$safe_value%'";
$result_publishers = $conn->query($sql_publishers);


$sql_categories = "SELECT categories.*, books.* FROM categories INNER JOIN books ON categories.id = books.category_id WHERE categories.category LIKE '%$safe_value%'";
$result_categories = $conn->query($sql_categories);

$sql_none = "SELECT categories.*, books.*, authors.*, publishers.* FROM (((categories 
INNER JOIN books ON categories.id = books.category_id)
INNER JOIN authors ON authors.id = books.author_id)
INNER JOIN publishers ON publishers.id = books.publisher_id) WHERE categories.category NOT LIKE '%$safe_value%' 
AND books.title NOT LIKE '%$safe_value%' AND publishers.publisher NOT LIKE '%$safe_value%' 
AND authors.name NOT LIKE '%$safe_value%'";
$result_none = $conn->query($sql_none);


if($result_books->num_rows <= 0 && $result_authors->num_rows <= 0 && $result_publishers->num_rows <= 0 && $result_categories->num_rows <= 0) {
?> 
<h4 class="result-list">Няма намерени резултати!</h4> <?php
} else {
        ?> <h4 class="result-list">Резултати от търсенето:</h4><div class="content-r"><?php
         if ($result_books) {
            while($row = mysqli_fetch_assoc($result_books)) {
                ?> <a class="result" href="<?php echo URLBASE ?>/view-book.php?id=<?php echo $row['id']; ?>" class="btn btn-sm"><?php echo $row['title'];?></a> <?php echo "<br>";  }}


                if ($result_authors) {
                    while($row = mysqli_fetch_assoc($result_authors)) {
                        ?> <a class="result" href="<?php echo URLBASE ?>/view-book.php?id=<?php echo $row['id']; ?>" class="btn btn-sm"><?php echo $row['name'] . ": " . $row['title'];?></a> <?php echo "<br>"; }}
        
                        if ($result_publishers) {
                            while($row = mysqli_fetch_assoc($result_publishers)) {
                                ?> <a class="result" href="<?php echo URLBASE ?>/view-book.php?id=<?php echo $row['id']; ?>" class="btn btn-sm"><?php echo $row['publisher'] . ": " . $row['title'];?></a> <?php echo "<br>"; }}

                                if ($result_categories) {
                                    while($row = mysqli_fetch_assoc($result_categories)) {
                                        ?> <a class="result" href="<?php echo URLBASE ?>/view-book.php?id=<?php echo $row['id']; ?>" class="btn btn-sm"><?php echo $row['category'] . ": " . $row['title'];?></a> <?php echo "<br>"; }}

                                  
                                }
                                 ?> </div>
                                 
