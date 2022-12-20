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

<div class="md:container md:mx-auto mt-12">

<?php include "layouts/dati.php"; ?>

 <form action="" method="post">
  <div>
   <select id="select_mov" name="tipo_mov" class="form-select mt-5" aria-label="Disabled select example">
    <option value="-1">Seleziona nome Categoria</opton>
    <?php
       $strSQLM="SELECT * FROM TCategorieMovimenti";
       $queryM=mysqli_query($conn, $strSQLM);
      
       while ($rowM=mysqli_fetch_assoc($queryM)){
       ?> 

         <option value="<?php echo($rowM["CategoriaMovimentoID"]);?>"><?php echo($rowM["NomeCategoria"]);?></option>

    <?php 
       
    }  
     
    ?>
   </select>
  
  </div>
  <button type="submit" class="my-4 btn bg-primary btn-primary mb-3">Submit</button>
</form>
 
 <table class="table table-dark table-striped my-12">
          <tr>
            <th>#</th>
            <th>data</th>
            <th>importo</th>
            <th>tipo movimento</th>      
          </tr>
    
 <?php

 if (isset($_POST["tipo_mov"])) {
            $val= $_POST["tipo_mov"];
            //echo $val;
            
     
  $strSQL = "SELECT TMovimentiContoCorrente.MovimentoID,TMovimentiContoCorrente.Data,TMovimentiContoCorrente.Importo,
            TCategorieMovimenti.NomeCategoria as NomeCategoria FROM TMovimentiContoCorrente INNER JOIN TCategorieMovimenti on 
            TMovimentiContoCorrente.CategoriaMovimentoID=TCategorieMovimenti.CategoriaMovimentoID WHERE TMovimentiContoCorrente.ContoCorrenteID=" . $CcID . "
            AND TMovimentiContoCorrente.CategoriaMovimentoID = " . $val . " ORDER BY Data desc";
  // echo "sql 1: " . $strSQL; 

     
  $query=mysqli_query($conn, $strSQL); 
  while ($row=mysqli_fetch_assoc($query)){
  ?>
  
  <tr>
   <td><?php echo $row['MovimentoID'];?></td>
   <td><?php echo $row['Data'];?></td>
   <td><?php echo $row['Importo'];?></td>
   <td><?php echo $row['NomeCategoria'];?></td>
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