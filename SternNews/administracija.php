<?php
    session_start();
    include 'connect.php';
    define('UPLPATH', 'images/');
    $uspjesnaPrijava = '';
    if(isset($_POST['prijava'])){
            $korisnicko_ime = $_POST['korisnicko_ime'];
            $lozinka = $_POST['lozinka'];
            
            $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
            $stmt = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }

            if (mysqli_stmt_num_rows($stmt) > 0){
                mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika); 
                mysqli_stmt_fetch($stmt);
                if(password_verify($lozinka, $lozinkaKorisnika)){
                    $uspjesnaPrijava = true;
                    if($levelKorisnika == 1){
                        $admin = true;
                    }else{
                        $admin = false;
                    }
                    //sesija
                    $_SESSION['$username'] = $imeKorisnika;
                    $_SESSION['$level'] = $levelKorisnika;

                }else{
                    $uspjesnaPrijava = false;
                    header("Location: login.php?id=pogresna_lozinka");
                    exit();
                }
            }else{
                $uspjesnaPrijava = false;
                header("Location: login.php?id=korisnik_ne_postoji");
                exit();
            } 
    } 
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
            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM clanak WHERE id=$id ";
                $result = mysqli_query($dbc, $query);
            }

            if(isset($_POST['update'])){
                $slika = $_FILES['slika']['name'];
                $naslov=$_POST['naslov'];
                $sazetak=$_POST['sazetak'];
                $sadrzaj=$_POST['sadrzaj'];
                $kategorija=$_POST['kategorija'];
                if(isset($_POST['arhiva'])){
                 $arhiva=1;
                }else{
                 $arhiva=0;
                }

                //Provjera slike
                if($slika===null){
                    $target_dir = 'images/'.$slika;
                    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
                    $id=$_POST['id'];
                    $query = "UPDATE clanak SET naslov=?, sazetak=?, tekst=?, slika=?, kategorija=?, arhiva=? WHERE id=? ";
                    $stmt = mysqli_stmt_init($dbc);
                        if(mysqli_stmt_prepare($stmt, $query)){
                            mysqli_stmt_bind_param($stmt, 'sssssis', $naslov, $sazetak, $sadrzaj, $slika, $kategorija, $arhiva, $id);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                        }
                    }else{
                        $id=$_POST['id'];
                        $query = "UPDATE clanak SET naslov=?, sazetak=?, tekst=?, kategorija=?, arhiva=? WHERE id=? ";
                        $stmt = mysqli_stmt_init($dbc);
                        if(mysqli_stmt_prepare($stmt, $query)){
                            mysqli_stmt_bind_param($stmt, 'ssssis', $naslov, $sazetak, $sadrzaj, $kategorija, $arhiva, $id);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                        }
                    }
                }
   

                if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
                    $query = "SELECT * FROM clanak";
                    $result = mysqli_query($dbc, $query);
                    echo '<h3>Bok ' . $_SESSION['$username'] . '!</h3>';
                    while($row = mysqli_fetch_array($result)) {
                        
            echo '
            <form class="form-container" enctype="multipart/form-data" action="" method="POST">
                <div class="vjest-update">
                    <h2>Uredi vjest:</h2>
                </div>
                <div class="form-item">
                    <label for="naslov">Naslov vjesti:</label>
                        <div class="form-field">
                            <input type="text" name="naslov" class="form-field-textual" value="'.$row['naslov'].'">
                        </div>
                </div>
                <div class="form-item">
                    <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
                        <div class="form-field">
                            <textarea name="sazetak" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
                        </div>
                </div>
                <div class="form-item">
                    <label for="sadrzaj">Sadržaj vijesti:</label>
                        <div class="form-field">
                            <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
                        </div>
                </div>
                <div class="form-item">
                    <label for="slika">Slika:</label>
                        <div class="form-field">
                            <input type="file" class="input-text" id="slika" name="slika"/> <br>
                            <h4>Trenutna slika:</h4>
                            <p>' . $row['slika']. '</p>
                            <img src="' . UPLPATH . $row['slika'] . '" width=300px>
                        </div>
                </div>
                <div class="form-item">
                    <label for="kategorija">Kategorija vijesti:</label>
                        <div class="form-field">
                            <select name="kategorija" id="" class="form-field-textual">    
                            <option value="znanost"'; if($row['kategorija'] == 'znanost') echo ' selected'; echo '>Znanost</option>
                            <option value="politika"'; if($row['kategorija'] == 'politika') echo ' selected'; echo '>Politika</option>
                            <option value="tehnologija"'; if($row['kategorija'] == 'tehnologija') echo ' selected'; echo '>Tehnologija</option>
                            <option value="ostalo"'; if($row['kategorija'] == 'ostalo') echo ' selected'; echo '>Ostalo</option>
                            </select>
                        </div>
                </div>
                <div class="form-item">
                    <label>Spremiti u arhivu:
                        <div class="form-field">';
                            if($row['arhiva'] == 0) {
                                echo '<input type="checkbox" name="arhiva" id="arhiva"/> Arhiviraj?';
                            } 
                            else {
                                echo '<input type="checkbox" name="arhiva" id="arhiva" checked/> Arhiviraj?';
                            }
                echo   '</div>
                    </label>
                </div>
                    <div class="form-item">
                        <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                            <button type="reset" value="Poništi">Poništi</button>
                            <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                            <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                    </div>
                </form>
                ';}
            } else if ($uspjesnaPrijava == true && $admin == false) {

                echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
             } else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
                echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
             } else if ($uspjesnaPrijava == false) {
             ?>
             <!-- Forma za prijavu -->
             <script type="text/javascript">
             
             //javascript validacija forme
             
             </script>
             
             <?php
             }
             ?>
        <footer>
            <p>Nachrichten vom 17.05.2019 | © stern.de GmbH | Home</p>
        </footer>
    </div>
</body>
</html>
