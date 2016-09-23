<?php ob_start();?>


<!--this is the all content -->
<?php
$query = "SELECT * FROM posts ORDER BY posts . post_id DESC";
$all_post = mysqli_query($connected, $query);
    while ($row = mysqli_fetch_assoc($all_post)){
       
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
       <h4> <a href="post.php?p_id=<?php echo $post_id ;?>"> <?php echo $post_title ;?></a> </h4>
        <a href="post.php?p_id=<?php echo $post_id ;?>">
        
        <img class="img-responsive"  
             
        
       src="<?php   echo $post_image;  ?>"  alt="">
        </a>  
           
           
            <h5>Price: &#8369;<?php echo $post_price ;  ?> <span class="span6 pull-right"> <a href="sms:<?php echo $post_phone;?>">Phone:<span class="glyphicon glyphicon-phone"></span></a></span></h5><br>
  
         
          </div>
   
        </div>
      
</div>        
<?php   } ?>
       
 