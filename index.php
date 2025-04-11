<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Najskôr sa musíte prihlásiť</h2>

    <form action="index.php" method="post">
        <input type="email" name="mail" placeholder="Zadajte email" required> <br>
        <input type="password" name="heslo" placeholder="Zadajte heslo" required> <br>
        <input type="submit" name="tlacidlo" value="Prihlásiť">
    </form>

    <?php
        if(isset($_POST["tlacidlo"])) {
            if(isset($_POST["mail"]) && isset($_POST["heslo"])) {
                $db_server = "localhost";
                $db_login = "root";
                $db_password = "vertrigo";
                $db_meno = "prihlasenie";

                $connection = mysqli_connect($db_server, $db_login, $db_password, $db_meno);
                mysqli_set_charset($connection, "utf8");

                $email = $_POST["mail"];
                $email = mysqli_real_escape_string($connection, $email);
                $heslo = $_POST["heslo"];
                $heslo = mysqli_real_escape_string($connection, $heslo);

                $dotaz = "SELECT * FROM udaje WHERE email='$email'";
                $prijem = mysqli_query($connection, $dotaz);
                $pocetRiadkov = mysqli_num_rows($prijem);   // funkcia spocita pocet riadkov, ktore sme dostali

                if($pocetRiadkov == 0) {
                    die("Použivatel neexistuje");
                }
                else {
                    $riadok = mysqli_fetch_assoc($prijem);
                    $hashHeslo = $riadok["heslo"];
                    if(!password_verify($heslo, $hashHeslo)) {
                        die("Zlé heslo");
                    }
                    else {
                        echo "Ste prihlasený";
                    }
                }








            }
        }



    ?>



    
</body>
</html>