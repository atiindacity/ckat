<?php ob_start();?>


<!--this is the all content -->
<?php
  if(isset($_SESSION['ckat_role'])){
     
     if('admin' !==  $_SESSION['ckat_role'] ){
         
         
        include "includes/postadd.php" ;
        
         
    
         
     } else if('subcriber' !==  $_SESSION['ckat_role'] ){
         
             include "includes/admin_post.php" ;
       
     } 
       }
?>