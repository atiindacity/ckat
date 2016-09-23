<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/ckat/user.php">C-Kat</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
<!--    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
        <ul class="nav navbar-nav">
        <li class="active"><a href="/ckat/user.php">Home</a></li>
        <li><a href="/ckat/user.php?source=about">About</a></li>
     <?php include "dropdown.php" ;?>
        </ul>
        
          <form action="/ckat/user.php?source=search" class="navbar-form navbar-left" role="search" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Search">
        </div>
        <button type="submit"  class="btn btn-default" name="submit">Submit</button>
      </form>
      
        
      <ul class="nav navbar-nav navbar-right">
           
<!--       this is for the login and logout button    -->
<?php
  if(isset($_SESSION['ckat_role'])){
     
     if('admin' !==  $_SESSION['ckat_role'] ){
         
          echo " <li>   <p class='navbar-text'><a href='/ckat/user.php?source=userpost'><b>Add Post</b></a></p>></li>";
           echo " <li>   <p class='navbar-text'><a href='/ckat/user.php?source=usercontent'><b>My Pages</b></a></p>></li>";
           echo " <p class='navbar-text'> <a href='/ckat/includes/logout.php'><b onclick>Log out</b> </a></p>";
         
        
         
    
         
     } else if('subcriber' !==  $_SESSION['ckat_role'] ){
         
          echo " <li>   <p class='navbar-text'><a href='/ckat/index.php'><b>Admin</b></a></p>></li>";
         
         echo " <p class='navbar-text'> <a href='/ckat/includes/logout.php'><b onclick>Log out</b> </a></p>";
       
     } 
  }
  
?>
   
        <li class="dropdown">
        
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
                        <div class="col-md-12">

                        
                        </div>
					 </div>
				</li>
			</ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
