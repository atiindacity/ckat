
<?php
  if(isset($_SESSION['ckat_role'])){
     
     if('admin' !==  $_SESSION['ckat_role'] ){  // THIS IS FOR USER
         
         
        include "includes/postadd.php" ;  
        
         
    
         
     } else if('subcriber' !==  $_SESSION['ckat_role'] ){  // THIS IS FOR ADMIN
         
             include "includes/postadd.php" ;
       
     } 
 } else {
      
      
      
 echo"     
<div class='container'>
<div class='row'>
<div class='col-sm-3'>

</div>
<div class='col-sm-6'> <h2>Access denied login first!</h2>   

<p class='text-center'><a href='/ckat/index.php?source=login'><b><h4>Click here to Login.</h4></b> </a></p>
</div> 
   
    <div class='col-sm-3'>
      
    </div>
  </div>
</div>   ";
      
      
      include "content.php" ;  
      
  }
  
?>







