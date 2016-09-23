<?php ob_start() ;?>
<?php include "includes/header.php" ;?>

<body>

<!-- Navigation -->

<?php include "includes/nav.php" ;?>


<?php include "includes/post_get.php" ;?>

       <div class="container">
  <div class="row">
    <div class="col-sm-4">
      
    </div>
    
    <div class="col-sm-4">
     
<div>                                                      
 
       <h3>  <?php echo $post_title ;?> </h3>
             
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php if(empty($post_image)){ echo $post_defualt_img; } else {  echo $post_image; } ?>" alt="...">

    </div>
    <div class="item">
      <img src="<?php if(empty($post_image2)){ echo $post_defualt_img; } else {  echo $post_image2; } ?>" alt="...">

    </div>
    <div class="item">
      <img src="<?php if(empty($post_image3)){ echo $post_defualt_img; } else {  echo $post_image3; } ?>" alt="...">

    </div>
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
    
           
            <h5>Price:  &#8369;<?php echo $post_price ;  ?> <span class="span6 pull-right"> <a href="sms:<?php echo $post_phone;?>">Phone:<span class="glyphicon glyphicon-phone"></span></a></span></h5><br>   
</div>  
        <div>
         <h4>  Discription: </h4>
           <small> <?php echo $post_date ;?></small>
            <p> <?php echo $post_content ;?> </p></div>  
          <h1>  </h1>     
    
    </div>
    
    <div class="col-sm-4">
     
    </div>
  </div>
</div>  
<!--==============================-->
  
  
  
  
  
  
  
  
  
   
          <div class="container">
  <div class="row">
   
   

   <div class="col-sm-4">
      
    </div>
      
       <div class="col-sm-4">
<?php include "includes/function.php" ;?>

<?php
if (isset($_POST['submit_commnet'])){
    
        $comment = escape($_POST['comment']);
        $postID =  escape($_POST['username']);
        $commentDate = date("Y-m-d"); 
           
$query = "INSERT INTO `commentcreated`( `commentDate`, `commentCreated`, `commentUser`) VALUES ('{$commentDate}','{$comment}','{$postID}')";
        
   $commentsend = mysqli_query($connected, $query);
    if(!$commentsend){
        die ("QUERY FAILED" . mysqli_error($connected));
}   else {
            echo " <div class='container'>
  <div class='row'>
    <div class='col-sm-4'>
      <p class='alert alert-success'>Your comment uploaded!!</p>
    </div>
    <div   class='col-sm-4'>
      
    </div>
    <div class='col-sm-4'>
     
    </div>
  </div>
</div>   
    ";     
     
   } 
           
                }        
    ?>
   
   
      <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
 <?php

//   this is for form user result query
              if (isset($_SESSION['ckat_role'])){
        $query = "SELECT `ckat_username` FROM `ckat_user` ";
        $userActive = mysqli_query($connected, $query);
          if($userActive ){
          
        
        while ($row = mysqli_fetch_assoc($userActive)){
         
            $ckat_username = $row['ckat_username'];
          
        }
              }
                    
              }
   
    
                    
        ?>

                    <form class="form" role="form" method="post" accept-charset="UTF-8">
                       
                           <input  type="username" name="username" class="form-control" value=" <?php   echo $ckat_username; ?>"> 
                             <div class="form-group">
                            <textarea  type="text" class="form-control" rows="2" name="comment" placeholder="Comment"></textarea>
                        </div>
                        <button type="submit" name="submit_commnet" class="btn btn-primary btn-block">Submit</button>
                    </form> 
                </div>

                <hr>
           <h3> Comments</h3>

                <!-- Posted Comments -->

 <?php
           
           if(isset($_GET['comments'])){
               $comPages = $_GET['comments'];
               
           } else {
               $comPages = "";
           }
           if($comPages == "" || $comPages == 1){
               
               $comPages_1 = 0;
               
           } else {
               $comPages_1 = ($comPages * 5) - 5;
               
           }
           
           
           
//           comments count here
           $countComment = "SELECT * FROM `commentcreated`";
           $countResult = mysqli_query($connected, $countComment);
           $NumCount = mysqli_num_rows($countResult);
           
           $count  = ceil($NumCount / 5);
           
           
           
           
$query = "SELECT * FROM `commentcreated`  
ORDER BY `commentcreated`.`commentsID`  DESC LIMIT $comPages_1, 5";
$userComment = mysqli_query($connected, $query);
    while ($row = mysqli_fetch_assoc($userComment)){
       
         $comID = $row['commentsID']; 
        $comDate = $row['commentDate']; 
        $comCreated = $row['commentCreated'];
         $comUser = $row['commentUser'];
   
 ?>
<!--                        comments view-->
     
     <div class="media">
  <a class="media-left" href="#">
    <img class="media-object" data-src="http://placehold.it/64x64" alt="Generic placeholder image">
  </a>
  <div class="media-body">
    <h4 class="media-heading"><?php   echo   $comUser ; ?></h4><small> <?php   echo    $comDate  ; ?></small> <br>
   <?php   echo    $comCreated  ; ?> 
  </div>
</div>  
  
   <?php   }  ?>
   
<!--   start the new count here-->
   
   <ul class="pager">
   <?php 
       for($i = 1; $i <= $count; $i++){
           
           echo "<li><a href='post.php?comments={$i}'>{$i}</a><li>";
           
       }
       
       
       
       ?>
   
   </ul>
    </div>
 
       <div class="col-sm-4">
    </div>
 
    
    
    </div>

     </div>
       <!-- Footer -->
    
    
    <?php include "includes/footer.php" ;?>    
    