<?php

if(isset($_GET['name'])) $name = $_GET['name'];
else $name = "Not entered.";


/* echo <<<_END


_END */


?>

<html>
    <head>
        <title>Form test</title>
</head>
<body>
Your name is: <?php echo $name;?><br>
<form method="get" actions='forms.php'>
What is your name?
<input type="text" name="name">
<input type="submit">
</form>
</body>
</html>