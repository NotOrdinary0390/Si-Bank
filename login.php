<!DOCTYPE html>
<html>
<title>LOGIN SiBank</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!-- TAILWIND -->
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container-sm mt-5 bg-dark.bg-gradient p-5">
        <form name="FormLogin" action="#" method="post">
            <h2 class="text-4xl">Accedi al tuo account</h2>
            <div class="my-2.5">
            <b class="text-2xl text-lime-300 border" >Si
                <span class="text-4xl bg-lime-500 text-white">Bank</span>
            </b>
            </div>
            <br>
            <input class="form-control" type="text" id="codiceTit" placeholder="codice titolare" name="CodiceTit" required>
            <br>
            <input class="form-control" type="password" id="password" placeholder="password" name="Password" required>
            <br>
            <button class="btn btn-primary" type="submit" value="accedi">Login</button>
        </form>
    </div>
    <?php
    include "../dbconn.php";
    session_start();

    $codice_titolare = $_POST["CodiceTit"];
    $password = $_POST["Password"];



    if (!empty($codice_titolare) && !empty($password)) {
        $strSQL = "select * from TContoCorrente WHERE CodiceTitolare='" . $codice_titolare . "' AND Password='" . $password . "'";
        echo $strSQL;
        $query = mysqli_query($conn, $strSQL);
        $numeroRecord = mysqli_num_rows($query);
        if ($numeroRecord > 0) {

            $row = mysqli_fetch_assoc($query);
            // questa variabile session potrà essere usata anche in altre pagine DELLA STESSA SESSIONE
            // NOMEVARIABILE= VALORE (SESSION)
            $_SESSION['NomeTitolare'] = $row['NomeTitolare'];
            $_SESSION['IBAN'] = $row['IBAN'];
            $_SESSION['ID'] = $row['ContoCorrenteID'];
            $_SESSION['CodeUser'] = $row['CodiceTitolare'];

            header("location: homepage.php");
        } else {
            echo ("credenziali non valide o email non confermata oppure utente eliminato");
        }
    }

    ?>


</body>

</html>