<?php 
require_once "includes/dbconnect.php";



if($conn === false){ 
    die("ERROR: Could not connect. " 
        . mysqli_connect_error()); 
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$bname =  $_POST['bname']; 
$isbn = $_POST['isbn']; 
$year =  $_POST['year']; 
$desc = $_POST['desc']; 
$price = $_POST['price']; 
$lang = $_POST['lang']; 

$sql = "INSERT INTO books (title, isbn, year, description, price, lang) VALUES ('$bname',  
'$isbn','$year','$desc','$price', '$lang')"; 


if(mysqli_query($conn, $sql)){ 
    echo "<h3>Data stored in a database successfully." 
        . " Please browse your localhost php my admin" 
        . " to view the updated data.</h3>";  

    echo nl2br("\n$bname\n $isbn\n "
        . "$year\n $desc\n $price $lang\n"); 
} else{ 
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn); 
} 
  
mysqli_close($conn); 
}
?>

<html lang="en">
    <head>
        <title>My bookstore form</title>
        <meta charset="UTF-8">
    </head>
        <body>
        <h1>Book store</h1>
            <form method="post" actions="book_form.php">
                <label for="bname">Book title:</label><br>
                <input type="text" id="bname" name="bname" maxLength="50"><br>
                <label for="isbn">ISBN:</label><br>
                <input type="number" id="isbn" name="isbn" oninput="this.value=this.value.slice(0,this.maxLength)" maxLength="13"><br>
                <label for="year">Year:</label><br>
                <input type="number" id="year" name="year" oninput="this.value=this.value.slice(0,this.maxLength)" maxLength="4" max="2021" min="1"><br>
                <label for="desc">Description:</label><br>
                <textarea type="text" id="desc" name="desc" maxLength="256"></textarea><br>
                <label for="price">Price:</label><br>
                <input type="number" id="price" name="price" oninput="this.value=this.value.slice(0,this.maxLength)" maxLength="5" step="any" min="1.00" max="250.00"><br><br>
                <label for="lang">Language:</label><br>
                <input type="text" id="lang" name="lang" maxLength="12"><br>
                <input type="submit"><br>
            </form>
        </body>
</hmtl>
<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
</script>