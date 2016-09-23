<?php include "function.php" ;?>

<?php

if (isset($_POST['submit'])){
    
        $title = escape($_POST['title']);
        $content = escape($_POST['content']);
        $price = escape($_POST['price']);
        $phone = escape($_POST['phone']);
        $username = escape($_POST['username']);
        $current_date = date("Y-m-d");
        
        $image =  escape($_FILES["image"]["name"]);
        $image_temp = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES["image"]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES["image"]["error"]; // 0 for false... and 1 for true
        $kaboom = explode(".", $image); // Split file name into an array using the dot
        $fileExt = end($kaboom);// Now target the last array element to get the file extension
    
    
        $image2 =  escape($_FILES["image2"]["name"]);
        $image_temp2 = $_FILES['image2']['tmp_name'];   
        $fileSize2 = $_FILES["image2"]["size"]; // File size in bytes
        $fileErrorMsg2 = $_FILES["image2"]["error"]; // 0 for false... and 1 for true
        $kaboom2 = explode(".", $image2); // Split file name into an array using the dot
        $fileExt2 = end($kaboom2); 
    
        $image3 =  escape($_FILES["image3"]["name"]);  
        $image_temp3 = $_FILES['image3']['tmp_name'];
        $fileSize3 = $_FILES["image3"]["size"]; // File size in bytes 
        $fileErrorMsg3 =$_FILES["image3"]["error"]; // 0 for false... and 1 for true
        $kaboom3 = explode(".", $image3); // Split file name into an array using the dot
        $fileExt3 = end($kaboom3); 
    
    if (!$image_temp && !$image_temp2 && !$image_temp3) { // if file not chosen
           echo "  
            <div class='container'>
  <div class='row'>
    <div class='col-sm-4'>
      <p class='alert alert-warning'>ERROR: Please browse for a file before clicking the upload button.</p>
    </div>
    <div   class='col-sm-4'>
      
    </div>
    <div class='col-sm-4'>
     
    </div>
  </div>
</div>   
    ";
    exit();
} else if($fileSize > 5242880 && $fileSize2 > 5242880 && $fileSize3 > 5242880) { // if file size is larger than 5 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($image_temp ); // Remove the uploaded file from the PHP temp folder
    exit();
} else if (!preg_match("/.(gif|jpg|png)$/i", $image) && !preg_match("/.(gif|jpg|png)$/i", $image2) && !preg_match("/.(gif|jpg|png)$/i", $image3) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($image_temp2 ); // Remove the uploaded file from the PHP temp folder
     exit();
} else if ($fileErrorMsg == 1 && $fileErrorMsg2 == 1 && $fileErrorMsg3 == 1 ) { // if file upload error key is equal to 1
          echo "  
            <div class='container'>
  <div class='row'>
    <div class='col-sm-4'>
      <p class='alert alert-success'>ERROR: An error occured while processing the file. Try again.</p>
    </div>
    <div   class='col-sm-4'>
      
    </div>
    <div class='col-sm-4'>
     
    </div>
  </div>
</div>   
    ";
    

    exit();
}
                       
          move_uploaded_file($_FILES["image"]["tmp_name"], "image/$image " );
          move_uploaded_file($_FILES["image2"]["tmp_name"], "image/$image2 " ); 
          move_uploaded_file($_FILES["image3"]["tmp_name"], "image/$image3 " );
     
    
$target_file = "image/$image";
$image = "image/resized_$image";
$wmax = 780;
$hmax = 250;
ak_img_resize($target_file, $image, $wmax, $hmax, $fileExt);           

          
$target_file2 = "image/$image2";
$image2 = "image/resized_$image2";
$wmax = 280;
$hmax = 150;
ak_img_resize($target_file2, $image2, $wmax, $hmax, $fileExt2);               

  
   
$target_file3 = "image/$image3";
$image3 = "image/resized_$image3";            
$wmax = 280;
$hmax = 150;
ak_img_resize($target_file3, $image3, $wmax, $hmax, $fileExt3);   

    
$query = "INSERT INTO posts ( post_title, post_content, post_image, post_image2, post_image3, post_price, post_phone, user_name, post_date) ";
$query .= "VALUES ( '{$title}', '{$content}', '{$image}', '{$image2}', '{$image3}', '{$price}', '{$phone}', '{$username}', '{$current_date}' ) ";
        
   $userPost = mysqli_query($connected, $query);
    if(!$userPost){
        die ("QUERY FAILED" . mysqli_error($connected));
}   else {
            echo "  
            <div class='container'>
  <div class='row'>
    <div class='col-sm-4'>
      <p class='alert alert-success'>Thank you. your post are uploaded!!</p>
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
 
  
           
           // ---------- Include Universal Image Resizing Function --------



?> 
 
 
<div class="container">
  <div class="row">
    <div class="col-sm-2">
     
    </div>
    <div class="col-sm-8">
     
     
    <form class="form" role="form" method="post" action="#" enctype="multipart/form-data" >
      
         
         
       
          <div class="form-group">
            <h4><span class="label label-primary"></span> Post now </h4>
            
             <?php

//   this is for form user result query
              
        $query = "SELECT `ckat_username` FROM `ckat_user` ";
        $userActive = mysqli_query($connected, $query);
          if($userActive ){
          
        
        while ($row = mysqli_fetch_assoc($userActive)){
         
            $ckat_username = $row['ckat_username'];
          
        }
              }
        ?>

        
        <input type="username" class="form-control" name="username" value=" <?php   echo  $ckat_username; ?>">
        </div>
         
      
         
      
       
 
      
      
      
      
      
       
       <div class="form-group">
        <h4><span class="label label-primary">Title</span></h4>
        <input type="title" class="form-control" name="title" placeholder="Title of your item" required>
        </div>
       
        <div class="form-group">
        <h4><span class="label label-primary">Image 1</span></h4>
        <input type="file"  name="image" id="image" >
      
        
        </div>
        
        
          <div class="form-group">
        <h4><span class="label label-primary">Image 2</span></h4>
        <input type="file"  name="image2" id="image2" >
      
        
        </div>
        
        
          <div class="form-group">
        <h4><span class="label label-primary">Image 3</span></h4>
        <input type="file"  name="image3" id="image3" >
      
        
        </div>
        
        
        
        <div class="form-group">
        <h4><span class="label label-primary">Content Discription</span></h4>
<!--     CONTENT BEEN REPLACE   <input type="content" class="form-control" name="content" placeholder="content" >-->
          <textarea  type="text" class="form-control" rows="5" name="content" placeholder="Content"></textarea>
        </div>

        
        
        
        
        
        <div class="form-group">
            <h4><span class="label label-primary">Price</span></h4>
        
        <input type="number" class="form-control" name="price" placeholder="Input your Price">
        </div>
        <div class="form-group">
        <h4><span class="label label-primary">Phone Number</span></h4>
        <input type="number" class="form-control" name="phone" placeholder="+63 123 456 7890" >
        </div>
       
       

  
       
           
            
            <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit Post</button>
        </div>
    </form> 
    </div>
    <div class="col-sm-2">
     
    </div>
  </div>
</div>






