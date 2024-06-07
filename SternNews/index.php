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
                $categoryQuery = "SELECT DISTINCT kategorija FROM clanak WHERE arhiva=0";
                $categoryResult = mysqli_query($dbc, $categoryQuery);
                if(mysqli_num_rows($categoryResult) > 0){
                    while($categoryRow = mysqli_fetch_array($categoryResult)){
                        $category = $categoryRow['kategorija'];
                        $articleQuery = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija='$category' LIMIT 4";
                        $articleResult = mysqli_query($dbc, $articleQuery);
                        echo '<section class="'.$category.'">';
                        if (mysqli_num_rows($articleResult) > 0) {
                            echo '<h2>'.$category.' ></h2>';
                            echo '<div class="articles">';       
                            while($row = mysqli_fetch_array($articleResult)){
                                echo '<article>';
                                echo '<a href="clanak.php?id='. $row['id'] .'">'; 
                                echo '<img src="' . UPLPATH . $row['slika'] . '">';
                                echo '<h3>' . $row['naslov'] . '</h3>';
                                echo '<p>' . $row['sazetak'] . '</p>';
                                echo '</a>';
                                echo '</article>';
                            }
                            echo '</div>';
                        }
                        echo '</section>';
                    }
                }
            ?>

        <footer>
            <p>Nachrichten vom 17.05.2019 | © stern.de GmbH | Home</p>
        </footer>
    </div>
</body>
</html>
