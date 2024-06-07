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
            $kategorija = $_GET['id'];
            $articleQuery = "SELECT * FROM clanak WHERE arhiva=0 AND kategorija=?";

            $stmt = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt, $articleQuery)){
                mysqli_stmt_bind_param($stmt, 's', $kategorija);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }           

            echo '<section class="'.$kategorija.'">';
                echo '<h2>'.$kategorija.' ></h2>';
                if (mysqli_stmt_num_rows($stmt) > 0){
                    mysqli_stmt_bind_result($stmt, $id, $datum, $naslov, $sazetak, $tekst, $slika, $category, $arhiva); 
    
                    echo '<div class="articles">';           
                    while(mysqli_stmt_fetch($stmt)){
                        echo '<article>';
                        echo '<a href="clanak.php?id='. $id .'">'; 
                        echo '<img src="' . UPLPATH . $slika . '">';
                        echo '<h3>' . $naslov . '</h3>';
                        echo '<p>' . $sazetak . '</p>';
                        echo '</a>';
                        echo '</article>';
                    }
                    echo '</div>';
                    mysqli_stmt_close($stmt);
                }   
                mysqli_close($dbc); 
                echo '</section>';

        ?>
           
        <footer>
            <p>Nachrichten vom 17.05.2019 | © stern.de GmbH | Home</p>
        </footer>
    </div>
</body>
</html>

