<?php
require_once 'dbconnect.php';

/* $user = $_POST['user']; // admin #' // anything' OR 1=1;
$pass = $_POST['pass']; //

$query = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";

$query = "DELETE * FROM users WHERE user='$user' AND pass='$pass'"; */


$user = mysql_entities_fix_string($conn, $_POST['user']);

function mysql_entities_fix_string($conn, $string) {
    return htmlentities(mysql_fix_string($conn, $string));
}

function mysql_fix_string($conn, $string) {
    if(get_magic_quotes_gpc()) $string = stripcslashes($string);
    return $conn->real_escape_string($string);
} 


echo "<br>";
/* $stmt = $conn->prepare('INSERT INTO authors VALUES(?,?,?,?)');
$stmt->bind_param('ssss', $id, $name, $bio, $created);
$id = NULL;
$name = 'Jest Je';
$bio = 'Ksad sdakjjksakj askjasdjk';
$created = NULL;


$stmt->execute();

// Проверка дали е изпълнено успешно

printf("%d Row inserted.\n", $stmt->affected_rows);
$stmt->close();
$conn->close(); */

?>