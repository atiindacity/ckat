<?php ob_start() ;?>
<?php include "includes/header.php" ;?>

<body>

<!-- Navigation -->

<?php include "includes/nav.php" ;?>

<!-- Page Content -->
   <div class="container">
  <div class="row">
    <div class="col-sm-2">
      
    </div>
    <div class="col-sm-6">
       <h3 class="alert alert-warning"><b>WARNING:</b>This website is under developement!</h3>
    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>

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
            
             case 'search';
            include "includes/insearch.php" ;
            break;
            
             case 'noresult';
            include "includes/noresult.php" ;
            break;
            
            
            case 'login';
            include "includes/login.php" ;
            include "includes/form.php" ;
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