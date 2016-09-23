<?php include "includes/adminheader.php" ;?>

<body>

    <!-- Navigation -->
    
    
<?php include "../includes/nav.php" ;?>
   
   
   
   
   
    <!-- Page Content -->

 


<?php

if (isset($_GET['p_id'])){
    
    $post_id = $_GET['p_id'];



$query = "SELECT * FROM posts WHERE post_id = $post_id ";
$all_post = mysqli_query($connected, $query);
         $row = mysqli_fetch_assoc($all_post);
       
        $post_id = $row['post_id']; 
        $post_title = $row['post_title'];
         $post_content = $row['post_content'];
         $post_image = $row['post_image'];
         $post_price = $row['post_price'];
         $post_defualt_img = $row['post_defualt_img'];
         $post_email = $row['post_email'];
         $post_phone = $row['post_phone'];
        
?>    
        

    
   
   
   
       <div class="container">
  <div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-4">
     
<div>                                                      
 
       <h3>  <?php echo $post_title ;?> </h3>
        <a href="#">
        
        <img  width="350" height="350" src="image/<?php if(empty($post_image)){ echo $post_defualt_img; } else {  echo $post_image; } ?>"  alt="">
        </a>

            <h5>Price:  &#8369;<?php echo $post_price ;  ?> <span class="span6 pull-right"> <a href="sms:<?php echo $post_phone;?>">Phone:<span class="glyphicon glyphicon-phone"></span></a></span></h5><br>
  
         
      
</div>   

     <div>
         <h4>  Discription: </h4>
            <p> <?php echo $post_content ;?> </p></div>  
          <h1>  </h1> 
               
<?php  }  ?>
        
        
       
      
     
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
   
   
   
   
      <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

        
        
        
        
        
        
        
        
     

     
        
    </div>
    
    
    <div class="col-sm-4">
     
    </div>
  </div>
</div>
           
   
   
   
   
   
   
      
          
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/adminfooter.php" ;?>       