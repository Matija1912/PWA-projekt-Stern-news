<?php
    include 'connect.php';
    $slika=$_FILES['slika']['name'];
    $naslov=$_POST['naslov'];
    $sazetak=$_POST['sazetak'];
    $sadrzaj=$_POST['sadrzaj'];
    $kategorija=$_POST['kategorija'];
    $datum=date('d.m.Y.');
    if(isset($_POST['arhiva'])){
        $arhiva=1;
    }else{
        $arhiva=0;
    }

    $target =   'images/'.$slika;
    move_uploaded_file($_FILES['slika']['tmp_name'], $target);

    $query = "INSERT INTO clanak (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt, $query)){
        mysqli_stmt_bind_param($stmt, 'ssssssi', $datum, $naslov, $sazetak, $sadrzaj, $slika, $kategorija, $arhiva);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    mysqli_close($dbc);

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stern - Prikaz Vijesti</title>
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
        <section role="main">
                <div class="row">
                    <p class="category"><?php echo $kategorija; ?></p>
                    <h1 class="title"><?php echo $naslov; ?></h1>
                    <p>OBJAVLJENO:</p>
                </div>
                <section class="slika">
                <?php
                    echo "<img src='images/$slika'";
                ?>
                </section>
                <section class="about">
                    <p><?php echo $sazetak; ?></p>
                </section>
                <section class="sadrzaj">
                    <p><?php echo $sadrzaj; ?></p>
                </section>
        </section>
        <footer>
            <p>Nachrichten vom 17.05.2019 | © stern.de GmbH | Home</p>
        </footer>
    </div>
</body>
</html>
