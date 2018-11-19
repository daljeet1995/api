<?php 
  include('includes/connection.php');
  header('content-type:application/json');

  $actionName = $_POST["actionName"];

  if($actionName == "profile"){

  	if (is_uploaded_file($_FILES["user_image"]["tmp_name"]) ) {
 		
 		$tmp_file = $_FILES["user_image"]["tmp_name"];
 		$img_name = $_FILES["user_image"]["name"];
 		$upload_dir = "images/".$img_name;
    
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : '';
	$email = isset($_POST["email"]) ? $_POST["email"] : '';
	$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : '';

    // get the image extension
        $extension = substr($img_name,strlen($img_name)-4,strlen($img_name));
    // allowed extensions
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");    
	// Validation for allowed extensions .in_array() function searches an array for a specific value.
       if(!in_array($extension,$allowed_extensions))
       {
        $myArr = array('status' => 'false', 'message' => 'Invalid format. Only jpg / jpeg/ png /gif format allowed');
        echo json_encode($myArr);
       }else{
	
 
	if(!empty($full_name) && !empty($email) && !empty($mobile)){
		$query = "INSERT INTO profile (full_name, email, mobile,image) VALUES( '$full_name', '$email', '$mobile','$upload_dir')";
		$result = mysqli_query($conn, $query);
		if($result){
		    $resultData = array('status' => true, 'message' => 'Inserted Successfully...');
	    }else{
	    	$resultData = array('status' => false, 'message' => 'Can\'t able to insert new post...');
	    }
	}
	else{
    	$resultData = array('status' => false, 'message' => 'Please enter post details...');
    }
 
    echo json_encode($resultData);
}}
}

?>