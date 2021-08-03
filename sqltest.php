<?php
require_once "dbconnect.php";

/*$query = "CREATE TABLE cats ("

    . "id SMALLINT NOT NULL AUTO_INCREMENT, "
    . "family VARCHAR(32) NOT NULL, "
    . "name VARCHAR(32) NOT NULL, "
    . "age TINYINT NOT NULL, "
    . "PRIMARY KEY(id)"
    . ")"; */

    //$query = "DESCRIBE cats";
       /* $result = $conn->query($query);
    if(!$result) die ("Database access failed");
    
    $rows = $result->num_rows;
    
    echo "<table><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";
    for($j = 0; $j < $rows; $j++){
        $row = $result->fetch_array(MYSQLI_NUM);
        echo '<pre>';print_r($row);echo '</pre>';
        echo '<tr>';
        for($k = 0; $k < 4; ++$k)
           echo "<td>" . htmlspecialchars($row[$k]) . "</td>";
        echo '</tr>';
    }
    echo '</table>'; */

// $query = "INSERT INTO cats VALUES(NULL, 'Lion', 'Leo', 4)";

//$query = "UPDATE cats SET name='Charlie' WHERE name='Leo'";

//$query = "DELETE FROM cats WHERE name='Leo'";

/* $query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";

$result = $conn->query($query);
if(!$result) die ("Database access failed"); 
echo "The insert ID was: " . $conn->insert_id; */

 /* $query = "INSERT INTO cats VALUES (NULL, 'tet', 'terd', 4)";
 $result = $conn->query($query);
 $insertID = $conn->insert_id;

 $query = "INSERT INTO owners VALUE ($insertID, 'Ann', 'Smm')";
 $result = $conn->query($query); */ 
echo "<br>";    
/*$query = "SELECT * FROM books";
$result = $conn->query($query);
if(!$result) die ("Database access failed");

$rows = $result->num_rows;
for($j = 0; $j < $rows; $j++){
    $row = $result->fetch_array(MYSQLI_NUM);
    $subquery = "SELECT * FROM authors WHERE id='$row[3]'";
    $subresult = $conn->query($subquery);
    $subrow = $subresult->fetch_array(MYSQLI_NUM);
    if(!$subresult) die ("Database access failed");

    echo htmlspecialchars($row[2]) . " by " . htmlspecialchars($subrow[1]) . "<br>";
}*/
echo "<br>";    

$query = "SELECT books.title, authors.name FROM books INNER JOIN authors ON books.author_id = authors.id";
$result = $conn->query($query);
if(!$result) die ("Database access failed");
$rows = $result->num_rows;
for($j = 0; $j < $rows; $j++){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo htmlspecialchars($row['title']) . " by " . htmlspecialchars($row['name']) . "<br>";

}
?>