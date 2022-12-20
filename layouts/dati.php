
<div class="flex flex-row rounded-lg">
   <div class="bg-green-500 text-white h-20 p-6 w-50">
     <h1 class="text-xl"> Benvenuto <?php echo $utente?></h1>
   </div>
   <div class="bg-green-500 text-white h-20 p-6 w-50 text-center">
     <h1 class="text-xl"> <span class="text-black">IBAN</span> <?php echo $iban?></h1>
   </div>
 </div> 
 

   <?php 
      $strSALDO = "SELECT * FROM TMovimentiContoCorrente WHERE ContoCorrenteID='" . $CcID . "' ORDER BY Data desc LIMIT 1";
      $querySaldo = mysqli_query($conn, $strSALDO);
      while ($rowS = mysqli_fetch_assoc($querySaldo)) {
        $saldoAtt = $rowS['Saldo'];
        
   ?>

   <div class="border-lime-400 bg-sky-500 text-slate-50 my-8 h-8">
       <h4 class="p-2"><b>
         SALDO <?php echo '€' . number_format($rowS['Saldo'],2,",","."); ?> 
       </b></h4>
   </div>

<?php
       }
?>
 
