<?php session_start() ;
      session_destroy();
?>
   

   <?php 
    $_SESSION['ckat_id'] = null;
    $_SESSION['usermo'] = null;
    $_SESSION['ckat_lastname'] = null;
    $_SESSION['ckat_role'] = null;

   
   header ("Location: ../index.php");





?>