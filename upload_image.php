<?php
 include('includes/connection.php');
 header('content-type:application/json');

 $response = array();

 if ($conn->connect_error) {
 	$response['MESSAGE'] = "ERROR in server";
 	$response["STATUS"]  = 500;
 }else{
 	//

 	if (is_uploaded_file($_FILES["user_image"]["tmp_name"]) ) {
 		
 		$tmp_file = $_FILES["user_image"]["tmp_name"];
 		$img_name = $_FILES["user_image"]["name"];
 		$upload_dir = "images/".$img_name;

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

 		$sql = "INSERT into deal_img(image) VALUES ('$upload_dir')";

 		if (move_uploaded_file($tmp_file, $upload_dir) && $conn->query($sql)) {
 			// $response['MESSAGE'] = "upload success";
 	       // $response["STATUS"]  = 500;

 	        $response = array('status' => true, 'message' => 'upload success');
 		}else{
 			//$response['MESSAGE'] = "upload Failed";
 	        //$response["STATUS"]  = 404;

 	        $response = array('status' => false, 'message' => 'upload Failed');

 		}}
 	}else{
        //$response['MESSAGE'] = "Invalid Request";
 	    //$response["STATUS"]  = 400;

 	    $response = array('status' => false, 'message' => 'Invalid Request');
 	}
 }
  echo json_encode($response);

?>