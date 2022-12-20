<?php
    include "../dbconn.php";
    session_start();

    $utente = $_SESSION['NomeTitolare'];
    $iban = $_SESSION['IBAN'];
    $CcID = $_SESSION['ID'];
    $CodeUser = $_SESSION['CodeUser'];

   
    if (isset($_SESSION['ID'])) {
?>
<!DOCTYPE html>

<?php include "layouts/navbar.php"; ?>

<div class="md:container md:mx-auto my-12">

<?php include "layouts/dati.php"; ?>

<h3 class="mt-20 text-xl font-semibold">Dati Bonifico</h2>
<!-- FORM BONIFICO -->
<form name="bonifico" class="mt-12" method="post">
<input class="form-control h-12 w-50" type="text" placeholder="beneficiario" name="beneficiario" required>
<input class="form-control h-12 w-50 my-4" type="text" placeholder="iban beneficiario" name="iban_ben" required>
<input class="form-control h-12 w-50" type="text" placeholder="causale" name="causale" required>
<div class="input-group h-12 w-50 my-4">
  <input type="text" class="form-control" name="importo" placeholder="imp" required>
  <span class="input-group-text">€</span>
  <span class="input-group-text">0.00</span>
</div>


<input class="btn bg-primary text-white mt-6 w-50" type="submit" value="Submit">

</form>
</div>

<?php include "layouts/footer.php"; ?>

<?php

$benefic = $_POST["beneficiario"];
$iban_ben = $_POST["iban_ben"];
$causale = $_POST["causale"];
$imp = $_POST["importo"];
// echo $saldoAtt;
$saldo_finale = $saldoAtt - $imp;

$strSQL="INSERT INTO TMovimentiContoCorrente (ContoCorrenteID,Importo,Saldo,
         CategoriaMovimentoID,DescrizioneEstesa) VALUES ('" . $CcID . "',
         '" .$imp . "','" .$saldo_finale . "','3','bonifico " . $causale . "')";
//echo $strSQL;
  $queryInsert=mysqli_query($conn, $strSQL);
  if ($queryInsert)
  { 
    if ($saldoAtt > $imp){
  	echo("record inserito");
    } else {
        echo("saldo non sufficiente");
    }
  }
  else
  {
  	echo("errore inserimento record");
  }

 }

 
 ?>
 
