


<?php ob_start() ;?>
<?php include "includes/header.php" ;?>

<body>

<!-- Navigation -->

<?php include "includes/usernav.php" ;?>

<!-- Page Content -->
<?php
if(isset($_GET['source'])) {
    
    $source = $_GET['source'];
    
   }  else {
    
    $source = '';
}
    
    switch ($source){
            
            case 'about';
            include "includes/about.php" ;
            break;
            
            case 'register';
            include "includes/signup.php" ;
            break;
            
            case 'login';
            include "includes/login.php" ;
            include "includes/form.php" ;
            break;
            
             case 'search';
            include "includes/insearch.php" ;
            break;
            
            case 'userpost';
            include "includes/postByUser.php" ;
            break;
            
            case 'noresult';
            include "includes/noresult.php" ;
            break;
            
            case 'usercontent';
            include "includes/usercontent.php" ;
            break;
            
        default: 
           
         include "includes/content.php" ;
            include "includes/pagination.php" ;    
            break;
            
    }
    
  
    
    
    
    
?>

    



        <!-- Pagination -->
     
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php" ;?>       