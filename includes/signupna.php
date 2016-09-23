<?php 


//if (isset($_POST['submit'])){
// 
//        $username = $_POST['username'];
//        $name = $_POST['name'];
//        $lname = $_POST['lname'];
//        $passmo = $_POST['passmo'];
//        $emailmo = $_POST['emailmo'];
//        $subcriber = $_POST['subcriber'];
//        $agreeako = $_POST['agreeako'];
//        $current_date = date("Y-m-d");
//    
//    
//        $username = mysqli_real_escape_string($connected, $username);
//        $name =  mysqli_real_escape_string($connected, $name);
//        $lname =  mysqli_real_escape_string($connected, $lname);
//        $passmo =  mysqli_real_escape_string($connected, $passmo);
//        $emailmo =   mysqli_real_escape_string($connected, $emailmo);
//        $subcriber =   mysqli_real_escape_string($connected, $subcriber);
//        $agreeako =  mysqli_real_escape_string($connected, $agreeako);
//    
//    $query = "SELECT * FROM ckat_user WHERE ckat_email = '$emailmo' ";
//    $emailmo  = mysqli_query($connected, $query);
//    $emailmo = mysqli_num_rows($emailmo);
//    if ($emailmo) echo "That email address already registerd. ";
//       
//    
// $query = "INSERT INTO ckat_user ( ckat_username, ckat_name, ckat_lastname, ckat_pass, ckat_email, ckat_role, ckat_agreeako, ckat_date) ";
//    $query .= "VALUES ( '{$username}', '{$name}', '{$lname}', '{$passm o}', '{$emailmo}', '{$subcriber}', '{$agreeako}', '{$current_date}' ) ";
//        
//   $ckatuser = mysqli_query($connected, $query);
//    if(!$ckatuser){
//        die ("QUERY FAILED" . mysqli_error($connected));
//}
//
//}


if($_POST['submit']=="signin") {
    $subcriber = $_POST['subcriber'];
    $agreeako = $_POST['agreeako'];
    $current_date = date("Y-m-d");
    if(!$_POST['emailmo']) $error.="<br />Please enter your email";
       else if (!filter_var($_POST['emailmo'], FILTER_VALIDATE_EMAIL)) $error.="<br />please enter a valid email address.";
    if (!$_POST['passmo']) $error.="<br />Please enter your password.";
        else {
             if (strlen($_POST['passmo'])<8) $error.="<br />Please enter at least 8 characters.";
             if (!preg_match('`[A-Z]`', $_POST['passmo'])) $error.="<br />Please include at least one Capital letter in your password";       
        }
    
    if($error) echo"There were errors on your sign up details";
      else {
           $query="SELECT * FROM ckat_user WHERE ckat_email = '".mysqli_real_escape_string($connected, $_POST['emailmo'])."'";
          $result = mysqli_query($connected, $query);
          
          $results = mysqli_num_rows($result);
          
          if($results) echo "That email address is already registered. try to log in."; else {
              
             $query="INSERT INTO `ckat_user` (`ckat_email`, `ckat_pass`, `ckat_date`, `ckat_role`, `ckat_agreeako`) VALUES('".mysqli_real_escape_string($connected, $_POST['emailmo'])."', '".md5(md5($_POST['emailmo']).$_POST['passmo'])."', '{$current_date}', '{$subcriber}', '{$agreeako}') "; 
              
              $ckatuser = mysqli_query($connected, $query);
             if(!$ckatuser){
             die ("QUERY FAILED" . mysqli_error($connected));
              echo "you are signed up!";
                 $_SESSION['ckat_id']=mysqli_insert_id($connected);
                 
                 
                 print_r($_SESSION);
                 
                 // REDERICT THE SESSION 
          }
          
          
      }
    
  }
    
    
        
}


?>



