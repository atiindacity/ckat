<?php ob_start();?>
 


<?php

 $p = $_SESSION['usermo'];

$query = "SELECT * FROM `posts` WHERE `user_name` LIKE '%{$p}%' ";
$query = "SELECT * FROM `posts` ORDER BY posts . `post_id` DESC ";
$all_post = mysqli_query($connected, $query);
    while ($row = mysqli_fetch_assoc ($all_post)){
         $post_id = $row['post_id'];
         $user_name = $row['user_name'];
         $post_title = $row['post_title'];
         $post_content = $row['post_content'];
         $post_image = $row['post_image'];
         $post_price = $row['post_price'];
         $post_email = $row['post_email'];
         $post_phone = $row['post_phone'];
         $post_defualt_img = $row['post_defualt_img'];
         $post_tags = $row['post_tags'];
         $post_date = $row['post_date'];
         
        
?>    
        

      
     
    
  
     
<div class="row-fluid">                                                      
  <div class="span4">                               
    <div class="col-md-3">
        <h3> <a href="post.php?p_id=<?php echo $post_id ;?>"> <?php echo $post_title ;?></a> </h3>
        
        <a href="#">
        
        <img class="img-responsive" src="image/<?php if(empty($post_image)){ echo $post_defualt_img; } else {  echo $post_image; } ?>"  alt="">
        </a>

            <h5>Price: &#8369;<?php echo $post_price ;  ?>  <span class="span6 pull-right"> <a href="sms:<?php echo $post_phone;?>">Phone:<span class="glyphicon glyphicon-phone"></span></a></span></h5><br>
  
         
          </div>
   
        </div>
      
</div>        

        
        
 
  
<?php  } ?>               