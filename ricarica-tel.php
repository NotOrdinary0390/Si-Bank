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
<br>
<!-- FORM RICARICA TELEFONICA -->
<form name="ric_tel" method="post" class="mt-20 mb-72">
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="operatore">
  <option selected>Operatore Telefonico</option>
  <option value="Tim">Tim</option>
  <option value="WindTre">WindTre</option>
  <option value="Vodafone">Vodafone</option>
  <option value="Iliad">Iliad</option>
  <option value="PosteMobile">PosteMobile</option>
  <option value="VeryMobile">VeryMobile</option>
</select>

<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="importo">
  <option selected>Importo ricarica</option>
  <option value="5">5€</option>
  <option value="10">10€</option>
  <option value="20">20€</option>
  <option value="25">25€</option>
  <option value="50">50€</option>
</select>

<input class="btn bg-primary text-white mt-6 w-100" type="submit" value="Submit">

</form>
</div>
<?php

include "layouts/footer.php"; 

$op =$_POST["operatore"];
$imp =$_POST["importo"];
// echo $saldoAtt;
$saldo_finale = $saldoAtt - $imp;

$strSQL="INSERT INTO TMovimentiContoCorrente (ContoCorrenteID,Importo,Saldo,
         CategoriaMovimentoID,DescrizioneEstesa) VALUES ('" . $CcID . "',
         '" .$imp . "','" .$saldo_finale . "','5','ricarica telefonica " . $op . "')";
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
