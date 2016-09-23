<?php ob_start();?>
  
<?php




$query = "SELECT * FROM posts";
$all_post = mysqli_query($connected, $query);
    while ($row = mysqli_fetch_assoc ($all_post)){
       
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
        <h3> <a href="#"> <?php echo $post_title ;?></a> </h3>
        <a href="#">
        
        <img class="img-responsive" src="../../image/<?php  echo $post_image; ?>"  alt="">
        </a>

            <h5>Price:<?php echo $post_price ;  ?> <span class="span6 pull-right"> Phone:<?php echo $post_phone;?></span></h5><br>
  
         
          </div>
   
        </div>
      
</div>        
<?php  } ?>
        
        