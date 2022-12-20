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
  
    <!-- TABELLA MOVIMENTI -->
   <table class="table table-dark table-striped mt-16 mb-60">
          <tr>
            <th>#</th>
            <th>importo</th>
            <th>descrizione</th>
            <th>tipo movimento</th>
            <th>data</th>
          </tr>
    <?php 
    $strSQL = "SELECT TMovimentiContoCorrente.MovimentoID,TMovimentiContoCorrente.Importo,
                      TMovimentiContoCorrente.DescrizioneEstesa,TMovimentiContoCorrente.Data,
                      TCategorieMovimenti.NomeCategoria as NomeCategoria
                      FROM TMovimentiContoCorrente INNER JOIN TCategorieMovimenti on
                      TMovimentiContoCorrente.CategoriaMovimentoID=TCategorieMovimenti.CategoriaMovimentoID
                      WHERE ContoCorrenteID='" . $CcID . "' ORDER BY Data desc LIMIT 5";
    //echo $strSQL;
   
    $query = mysqli_query($conn, $strSQL);
    // $numeroRecord = mysqli_num_rows($query);
    while ($row = mysqli_fetch_assoc($query)) {
    
    ?>
    
    <tr>
              <td><?php echo $row['MovimentoID']; ?></td>
              <td><?php echo '€' . number_format($row["Importo"],2,",","."); ?></td>
              <td><?php echo $row['DescrizioneEstesa']; ?></td>
              <td><?php echo $row['NomeCategoria']; ?></td>
              <td><?php echo $row['Data']; ?></td>
            </tr>
    
    <?php
       }
    ?>
        
    </table>

 </div>

 <?php 
 }
 include "layouts/footer.php";
 ?>
</body>

</html>