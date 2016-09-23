
<?php include "function.php" ;?>

<?php 


if (isset($_POST['submit'])){
 
        $username = escape($_POST['username']);
        $passmo = escape($_POST['passmo']);
        $emailmo = escape($_POST['emailmo']);
        $subscriber = escape($_POST['subscriber']);
        $agreeako = escape($_POST['agreeako']);
        $current_date = date("Y-m-d");
    
    
        $username = mysqli_real_escape_string($connected, $username);
        $passmo =  mysqli_real_escape_string($connected, $passmo);
        $subscriber =   mysqli_real_escape_string($connected, $subscriber);
        $agreeako =  mysqli_real_escape_string($connected, $agreeako);
    
    $query = "SELECT * FROM ckat_user WHERE ckat_email = '$emailmo' ";
    $emailmo  = mysqli_query($connected, $query);
    $emailmo = mysqli_num_rows($emailmo);
    if ($emailmo) echo "   
    
    
    <div class='container'>
  <div class='row'>
    <div class='col-sm-4'>
      
    </div>
    <div   class='alert alert-danger'>
      <p>That email address already registerd!</p>
    </div>
    <div class='col-sm-4'>
     
    </div>
  </div>
</div>   
    
    
    
    
    
    
    
    
     ";
     else{
    
       

 $query = "INSERT INTO ckat_user (ckat_username, ckat_email, ckat_pass, ckat_role, ckat_agreeako, ckat_date) ";
    $query .= "VALUES ('{$username}', '".mysqli_real_escape_string($connected, $_POST['emailmo'])."', '".md5(md5($username).$_POST['passmo'])."',  '{$subscriber}', '{$agreeako}', '{$current_date}' ) ";
        
   $ckatuser = mysqli_query($connected, $query);
    if(!$ckatuser){
        die ("QUERY FAILED" . mysqli_error($connected));
} else {  
        echo"    
            <div class='container'>
  <div class='row'>
    <div class='col-sm-4'>
      
    </div>
    <div   class='alert alert-success'>
      <p>Thank you for joining us your Sign up is succesful!<b> $username </b>Welcome to <b>Ckat.com</b> start selling and shopping with us now. <a href='/ckat/index.php?source=login'><b>Login here</b> </a></p>
    </div>
    <div class='col-sm-4'>
     
    </div>
  </div>
</div>         ";
    
    
    
    
    
    
    
    
    }
         
         
         
         
         
         
         
     }
}


?>

<div class="container">
  <div class="row">
    <div class="col-sm-2">
     
    </div>
    <div class="col-sm-8">
     
     
    <form class="form" role="form" method="post" action="#" >

       
       <div class="form-group">
        <h4><span class="label label-primary">User Name</span></h4>
        <input type="username" class="form-control" name="username" placeholder="UserName" required>
        </div>

        
        <div class="form-group">
            <h4><span class="label label-primary">Email address</span></h4>
        
        <input type="email" class="form-control"  name="emailmo" placeholder="Email address" required>
        </div>
        <div class="form-group">
        <h4><span class="label label-primary">Password</span></h4>
        <input type="password" class="form-control"  name="passmo" placeholder="Password" required>
        </div>
       
        
        <div class="form-group">
        <h4><span class="label label-primary">Subscriber</span></h4>
       <select name="subscriber">
  <option name="subscriber" value="subscriber">Subscriber</option>
</select>
        </div>
        
        
        
        
            <div class="checkbox">
            <label>
            <input type="checkbox" name="agreeako" value="yes" required> Agree for the <a href="about.php">Term</a> and <a href="about.php">Condition.</a>
            </label>
            </div>
            
            <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Sign up</button>
        </div>
    </form>
   
   
   
   
   
   
   
   
    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>