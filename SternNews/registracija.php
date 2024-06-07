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
    <style>
        .error {
            border: 1px dashed red;
        }
        .success {
            border: 1px solid green;
        }
    </style>
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
        $msg = '';
        $registriran_korisnik = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $korisnicko_ime = $_POST['korisnicko_ime'];
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $lozinka = $_POST['lozinka'];
            $lozinka_potvrda = $_POST['lozinka_potvrda'];

            if ($lozinka === $lozinka_potvrda) {
                $hashed_lozinka = password_hash($lozinka, PASSWORD_DEFAULT);

                $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }
                if(mysqli_stmt_num_rows($stmt) > 0){
                    $msg='Korisničko ime već postoji!';
                }else{
                    $query = "INSERT INTO korisnik (korisnicko_ime, ime, prezime, lozinka, razina) VALUES (?, ?, ?, ?, 0)";
                    $stmt = mysqli_stmt_init($dbc);
                    if(mysqli_stmt_prepare($stmt, $query)){
                        mysqli_stmt_bind_param($stmt, 'ssss', $korisnicko_ime, $ime, $prezime, $hashed_lozinka);
                        mysqli_stmt_execute($stmt);
                        $registriran_korisnik = true;
                    }

                }
                mysqli_close($dbc); 
            }
        }
        ?>
        <?php
            if($registriran_korisnik == true){
                echo '<p>Korisnik je uspješno registriran!</p>';
            }else {
        ?>
       
        <form id="registracijaForma" action="" method="POST">
            <label for="korisnicko_ime">Korisničko ime:</label><br>
            <?php echo '<span class="bojaPoruke" style="color:red;">'. $msg .'</span>'; ?>
            <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br>
            <span id="porukaKorisnickoIme" style="color:red;"></span><br>
    
            <label for="ime">Ime:</label><br>
            <input type="text" id="ime" name="ime" required><br>
            <span id="porukaIme" style="color:red;"></span><br>
    
            <label for="prezime">Prezime:</label><br>
            <input type="text" id="prezime" name="prezime" required><br>
            <span id="porukaPrezime" style="color:red;"></span><br>
    
            <label for="lozinka">Lozinka:</label><br>
            <input type="password" id="lozinka" name="lozinka" required><br>
            <span id="porukaLozinka" style="color:red;"></span><br>
    
            <label for="lozinka_potvrda">Potvrdite lozinku:</label><br>
            <input type="password" id="lozinka_potvrda" name="lozinka_potvrda" required><br>
            <span id="porukaLozinkaPotvrda" style="color:red;"></span><br>
    
            <button type="submit" id="slanje">Registracija</button>
        </form>

        <script type="text/javascript">
            document.getElementById("slanje").onclick = function(event) {
                let slanjeForme = true;
    
                // Provjera korisnickog imena
                let poljeKorisnickoIme = document.getElementById("korisnicko_ime");
                let korisnickoIme = poljeKorisnickoIme.value;
                if (korisnickoIme.length < 5 || korisnickoIme.length > 20) {
                    slanjeForme = false;
                    poljeKorisnickoIme.classList.add("error");
                    document.getElementById("porukaKorisnickoIme").innerHTML = "Korisničko ime mora imati između 5 i 20 znakova!<br>";
                } else {
                    poljeKorisnickoIme.classList.remove("error");
                    poljeKorisnickoIme.classList.add("success");
                    document.getElementById("porukaKorisnickoIme").innerHTML = "";
                }
    
                // Provjera imena
                let poljeIme = document.getElementById("ime");
                let ime = poljeIme.value;
                if (ime.length < 2) {
                    slanjeForme = false;
                    poljeIme.classList.add("error");
                    document.getElementById("porukaIme").innerHTML = "Ime mora imati najmanje 2 znaka!<br>";
                } else {
                    poljeIme.classList.remove("error");
                    poljeIme.classList.add("success");
                    document.getElementById("porukaIme").innerHTML = "";
                }
    
                // Provjera prezimena
                let poljePrezime = document.getElementById("prezime");
                let prezime = poljePrezime.value;
                if (prezime.length < 2) {
                    slanjeForme = false;
                    poljePrezime.classList.add("error");
                    document.getElementById("porukaPrezime").innerHTML = "Prezime mora imati najmanje 2 znaka!<br>";
                } else {
                    poljePrezime.classList.remove("error");
                    poljePrezime.classList.add("success");
                    document.getElementById("porukaPrezime").innerHTML = "";
                }
    
                // Provjera lozinke
                let poljeLozinka = document.getElementById("lozinka");
                let lozinka = poljeLozinka.value;
                if (lozinka.length < 6) {
                    slanjeForme = false;
                    document.getElementById("porukaLozinka").innerHTML = "Lozinka mora imati najmanje 6 znakova!<br>";
                } else {
                    document.getElementById("porukaLozinka").innerHTML = "";
                }
    
                // Provjera potvrde lozinke
                let poljeLozinkaPotvrda = document.getElementById("lozinka_potvrda");
                let lozinkaPotvrda = poljeLozinkaPotvrda.value;
                if (lozinkaPotvrda !== lozinka || lozinkaPotvrda === "" || lozinka === "") {
                    slanjeForme = false;
                    document.getElementById("porukaLozinkaPotvrda").innerHTML = "Lozinke se ne podudaraju ili su prazne!<br>";
                } else {
                    document.getElementById("porukaLozinkaPotvrda").innerHTML = "";
                }
    
                if (!slanjeForme) {
                    event.preventDefault();
                }
            }
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

