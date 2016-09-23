<?php include "function.php" ;?>
      
    <?php
    if(isset($_POST['signin'])){
     $usermo =  escape($_POST['usermo']);
     $passmo  = escape(md5(md5($usermo).$_POST['passmo']));
                
     
      $usermo =  mysqli_real_escape_string($connected, $usermo);
   
        
        $query = "SELECT * FROM ckat_user WHERE ckat_username = '{$usermo}' ";
        $user_lagin = mysqli_query($connected, $query);
        if(!$user_lagin ){
            die ("QUERY FAILED" . mysqli_error($connected));
        }
        
        while ($row = mysqli_fetch_assoc($user_lagin)){
            $ckat_id = $row['ckat_id']; 
            $ckat_username = $row['ckat_username'];
            $ckat_pass = $row['ckat_pass'];
            $ckat_name = $row['ckat_name'];
            $ckat_lastname = $row['ckat_lastname'];
            $ckat_email = $row['ckat_email'];
            $ckat_role = $row['ckat_role'];
        }
        
    if($usermo === $ckat_username && $passmo === $ckat_pass) {
        
            $_SESSION['ckat_id'] = $ckat_id;
            $_SESSION['usermo'] = $ckat_name;
            $_SESSION['ckat_lastname'] = $ckat_lastname;
            $_SESSION['ckat_role'] = $ckat_role;
    }
    }
        
?>
   
    
<?php
if (isset( $_SESSION['ckat_role'])){
    
    if($_SESSION['ckat_role'] != 'admin'){
        
        header ("Location: /ckat/user.php ");
    } else {
        
        header ("Location: /ckat/admin ");
        
    }
    
}






?>   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    
