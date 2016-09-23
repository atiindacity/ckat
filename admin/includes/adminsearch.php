<?php ob_start();?>
        

        <?php include "function.php" ;?>
         <?php
          
             if(isset($_POST['submit'])){
                 
               $search = $_POST['search'];

               $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ||  post_title LIKE '%$search%' ";
                 $search = mysqli_query($connected, $query);
                 
                 condie($search);
                  
                 $count = mysqli_num_rows($search);
                     
                  if($count == 0){
                                      
                      
                      
                      
                      
                      
                      
                echo "     <footer>
            
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
               
            <!-- /.row -->
        </footer>
                      
                      ";
                      
                      
                      
                   include "../includes/content.php" ;   
                      
                      
                      
                      
                      
                      
                      
     
                    

                 } else {
                       


    while ($row = mysqli_fetch_assoc($search)){
       
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
        
        <img class="img-responsive" src="image/<?php if(empty($post_image)){ echo $post_defualt_img; } else {  echo $post_image; } ?>"  alt="">
        </a>

            <h5>Price:<?php echo $post_price ;  ?> <span class="span6 pull-right"> Phone:<?php echo $post_phone;?></span></h5><br>
  
         
          </div>
   
        </div>
      
</div>        

        
        
               
             

     <?php  }  }   }  ?>       