<?php include "includes/adminheader.php" ;?>

<body>

    <!-- Navigation -->
    
    
<?php include "../includes/nav.php" ;?>
   
   
   
   
   
    <!-- Page Content -->

<?php ?>        
        
<?php
if(isset($_GET['source'])) {
    
    $source = $_GET['source'];
    
   }  else {
    
    $source = '';
}
    
    switch ($source){
            
            case 'about';
            include "../includes/about.php" ;
            break;
            
            case 'userpost';
            include "../includes/postByUser.php" ;
            break;
            
            case 'search';
            include "../includes/insearch.php" ;
            break;
            
            case 'myaccount';
            include "includes/admincontent.php" ;
            break;
            
            
            case 'admin';
            include "../includes/content.php" ;
            include "../includes/pagination.php" ;
            break;
            
            case 'noresult';
            include "../includes/noresult.php" ;
            break;
            
        default: 
           
         include "../includes/content.php" ;
            include "../includes/pagination.php" ;    
            break;
            
    }
    
  
    
    
    
    
?>

        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/adminfooter.php" ;?>       