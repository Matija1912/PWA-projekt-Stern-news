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
            $clanak_id = $_GET['id'];
            $article = "SELECT * FROM clanak WHERE id='$clanak_id'";
            $articleResult = mysqli_query($dbc, $article);
            if($articleResult && mysqli_num_rows($articleResult) > 0){
                $row = mysqli_fetch_assoc($articleResult);
            }
        ?>
        <section role="main">
            <div class="row">
                <h2 class="category">
                    <?php
                        echo "<span>".$row['kategorija']."</span>";
                    ?>
                </h2>
                <h1 class="title">
                    <?php
                        echo $row['naslov'];
                    ?>
                </h1>
                <p>OBJAVLJENO: 
                    <?php
                        echo "<span>".$row['datum']."</span>";
                    ?>
                </p>
            </div>
            <section class="slika">
                <?php
                    echo '<img src="' . UPLPATH . $row['slika'] . '">';
                ?>
            </section>
            <section class="about">
                <p>
                    <?php
                        echo "<i>".$row['sazetak']."</i>";
                    ?>
                </p>
            </section>
            <section class="sadrzaj">
                <p>
                    <?php
                        echo $row['tekst'];
                    ?>
                </p>
            </section>
        </section>
           
        <footer>
            <p>Nachrichten vom 17.05.2019 | © stern.de GmbH | Home</p>
        </footer>
    </div>
</body>
</html>
