<?php ob_start();?>
        
<?php include "function.php" ;?>
 <?php
      if(isset($_POST['submit'])){
              $search = escape($_POST['search']);
          
               $search =  mysqli_real_escape_string($connected,  $search);

              $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ||  post_title LIKE '%$search%' ||  post_content LIKE '%$search%' ";
                 $search = mysqli_query($connected, $query);
                 
                 condie($search);
                  
                 $count = mysqli_num_rows($search);
                     
         
   
            while ($row = mysqli_fetch_assoc($search)){
 
                 $post_id = $row['post_id'];
                 $post_title = $row['post_title'];
                 $post_content = $row['post_content'];
                 $post_image = $row['post_image'];
                 $post_price = $row['post_price'];
                 $post_defualt_img = $row['post_defualt_img'];
                 $post_email = $row['post_email'];
                 $post_phone = $row['post_phone'];

?>   
        

<div class="row-fluid">                                                      
  <div class="span4">                               
    <div class="col-md-3">
       <h3> <a href="post.php?p_id=<?php echo $post_id ;?>"> <?php echo $post_title ;?></a> </h3>
        <a href="post.php?p_id=<?php echo $post_id ;?>">
        
        <img class="img-responsive"  
             
        
       src="image/<?php   echo $post_image;  ?>"  alt="">
        </a>  
           
           
            <h5>Price: &#8369;<?php echo $post_price ;  ?> <span class="span6 pull-right"> <a href="sms:<?php echo $post_phone;?>">Phone:<span class="glyphicon glyphicon-phone"></span></a></span></h5><br>
  
         
          </div>
   
        </div>
      
</div>     
      
<?php   
            }
          
       }


         if($count == 0){          
   echo "<footer>
             <div class='container'>
              <div class='row'>
               <div class='col-sm-4'>
               </div>
                 <div class='col-sm-4'>
                   <p>No Result! Try defferent key words!</p>
                 </div>
              <div class='col-sm-4'>
              </div>
            </div>
          </div>
        </footer>";    
     
     } 
//  try this


  if(isset($_SESSION['ckat_role'])){
     
     if('admin' !==  $_SESSION['ckat_role'] ){
           include "includes/content.php" ;
       } else if('subcriber' !==  $_SESSION['ckat_role'] ){
          include "includes/content.php" ;
    } 
 } else {
       include "includes/content.php" ;

  };



?>       