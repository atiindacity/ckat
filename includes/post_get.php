
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
         $post_image2 = $row['post_image2'];
         $post_image3 = $row['post_image3'];
         $post_price = $row['post_price'];
         $post_defualt_img = $row['post_defualt_img'];
         $post_email = $row['post_email'];
         $post_phone = $row['post_phone'];
         $post_date = $row['post_date'];
}
        
?>    
        

    