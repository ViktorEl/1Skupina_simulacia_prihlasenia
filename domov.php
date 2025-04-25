<?php
    session_start();
    if(!isset($_SESSION["prihlasenie"]) || $_SESSION["prihlasenie"] !== true) {
        header("Location: index.php");
        exit();
    }
    if(isset($_POST["tlacidlo"])) {
        $_SESSION = array();
        header("Location: index.php");
        session_destroy();
        exit();
    }
?>


<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Vitajte na našej stránke</h1>

    <form action="domov.php" method="post">
        <input type="submit" name="tlacidlo" value="Odhlásiť">
    </form>


</body>
</html>