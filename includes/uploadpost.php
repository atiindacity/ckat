
<?php
$target_dir = "images/";
$target_file = $target_dir . basename($FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// CHECK FILES
if (isset($_POST['submit'])){
 
        $title = $_POST['title'];
        $image = $_FILES['image']['name'];
        $image_temp = getimagesize($_FILES['image']['tmp_name']);
    if($image_temp !== false) {
        $uplasdOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // check size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file format
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
        $uploadOk = 0;
    }
    // check if $uploadOk = 0 by an error
    if ($uploadOk == 0) {
        echo " Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
        $content = $_POST['content'];
        $price = $_POST['price'];
        $phone = $_POST['phone'];
         $username = $_POST['username'];
//        $tags = $_POST['tags'];
//        $userId = $_POST['user_id'];
        $current_date = date("Y-m-d");
    

//    
// 
//         
//             move_uploaded_file( $image_temp, "image/$image" );
       

    
      
  

       
    
 $query = "INSERT INTO posts ( post_title, post_content, post_image, post_price, post_phone, user_name, post_date) ";
$query .= "VALUES ( '{$title}', '{$content}', '{$image}', '{$price}', '{$phone}', '{$username}', '{$current_date}' ) ";
        
   $userPost = mysqli_query($connected, $query);
    if(!$userPost){
        die ("QUERY FAILED" . mysqli_error($connected));
}

}

?>