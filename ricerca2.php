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

 <form name="movimenti" action="" method="post">
  <div class="d-flex my-3">
  <div class="me-3">
    <input type="date" class="form-control" name="date1">
  </div>
  <div class="me-3">
    <input type="date" class="form-control" name="date2">
  </div>
  </div>
  <button type="submit" class="btn bg-primary btn-primary mb-3">Submit</button>
</form>
 
 <table class="table table-dark table-striped mt-12 mb-12">
          <tr>
            <th>#</th>
            <th>data</th>
            <th>importo</th>
            <th>tipo movimento</th>  
            <th></th>    
          </tr>
    
 <?php
// echo "date " . $_POST["date1"] . "e " . $_POST["date2"]; 
// echo "<br>";

if (isset($_POST["date1"]) && isset($_POST["date2"])) {
            $val1= $_POST["date1"];
            $val2= $_POST["date2"];
     
    $strSQL2 = "SELECT TMovimentiContoCorrente.MovimentoID,TMovimentiContoCorrente.Data,TMovimentiContoCorrente.Importo,
    TCategorieMovimenti.NomeCategoria as NomeCategoria FROM TMovimentiContoCorrente INNER JOIN TCategorieMovimenti on 
    TMovimentiContoCorrente.CategoriaMovimentoID=TCategorieMovimenti.CategoriaMovimentoID WHERE TMovimentiContoCorrente.ContoCorrenteID=" . $CcID . "
            AND (TMovimentiContoCorrente.Data BETWEEN '" . $val1 . "' AND '" . $val2 . "')
            ORDER BY Data desc";
  //echo "sql 2: " . $strSQL2;

  $query2=mysqli_query($conn, $strSQL2);  
  while ($row=mysqli_fetch_assoc($query2)){
  ?>
  
  <tr>
   <td><?php echo $row['MovimentoID'];?></td>
   <td><?php echo $row['Data'];?></td>
   <td><?php echo $row['Importo'];?></td>
   <td><?php echo $row['NomeCategoria'];?></td>
   <td><a href="dettaglio.php">dettaglio movimento</a></td>
  </tr>
  

  
  <?php
    
     }
  }
  ?>
  </table> 

</div>

<?php 
 }
 include "layouts/footer.php";
 ?>