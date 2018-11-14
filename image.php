<?php
  include('includes/connection.php');

  $response = array(); //response to client
 
  if ($mysqli->connect_error) {
  	$response["MESSAGE"] = "error in server";
  	$response["STATUS"] = 500;
  }else{
  	//test client submt all info or not
  	if (is_uploaded_file(isset($_FILE["user_image"]["tmp_name"]))) {
  		
  		$tmp_file = $_FILE["user_image"]["tmp_name"];// get file from client
  		$img_name = $_FILE["user_image"]["name"]; // get file name
  		 $upload_dir = "uploads/". $img_name;    //folder for upload image with file name want to save

  		 $sql = "INSERT INTO deal_img (image) VALUES ('{$_POST['img_name']}')";

  		 if (move_uploaded_file($tmp_file, $upload_dir) && $mysqli->query($conn,$sql)) {
  		 	$response["MESSAGE"] = "UPLOAD SUCCED";
  		 	$response["STATUS"]  = 200;
  		 }else{
  		 	$response["MESSAGE"] = "UPLOAD FAILED";
  		 	$response["STATUS"]  = 404;
  		 }
  		 // else{
     //        $response["MESSAGE"] = "INVALID REQUEST";
  		 // 	$response["STATUS"]  = 400;

  		 // }


  	}
  }
   echo json_encode($response);

?>