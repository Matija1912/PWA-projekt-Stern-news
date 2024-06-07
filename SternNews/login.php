<?php
    include 'connect.php';
    define('UPLPATH', 'images/');

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo/stern_logo.svg" alt="Stern Logo">
            </div>
            <h1 class="logo-title">stern</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="kategorija.php?id=politika">Politika</a></li>
                    <li><a href="kategorija.php?id=tehnologija">Tehnologija</a></li>
                    <li><a href="kategorija.php?id=znanost">Znanost</a></li>
                    <li><a href="kategorija.php?id=ostalo">Ostalo</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                    <li><a href="unos.html">Unos novih vijesti</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registracija.php">Registracija</a></li>
                </ul>
            </nav>
        </header> 
        <?php
            if(isset($_GET['id'])){
                $status = $_GET['id'];
                if ($status == 'korisnik_ne_postoji') {
                    echo '<span id="message" style="color:red;">Korisnik ne postoji.</span>';
                } elseif ($status == 'pogresna_lozinka') {
                    echo '<span id="message" style="color:red;">Pogrešna lozinka.</span>';
                }
            }
                echo '<form action="administracija.php" method="post">
                        Korisničko ime: <input type="text" name="korisnicko_ime" required><br>
                        Lozinka: <input type="password" name="lozinka" required><br>
                        <input name="prijava" type="submit" value="Prijava">
                    </form>';
        ?>
        <footer>
            <p>Nachrichten vom 17.05.2019 | © stern.de GmbH | Home</p>
        </footer>
    </div>
</body>
</html>
