<?php
    $nazovCookie = "virus";
    $hodnota = 116;
    $expiracia = time() + (7*24*60*60);
    setcookie($nazovCookie, $hodnota, $expiracia);
?>



<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Skúšame posielať cookies</h1>

    <?php
        if(isset($_COOKIE["virus"])) {
            echo $_COOKIE["virus"];
        }
        else {
            echo "cookie neexistuje";
        }

?>

</body>
</html>