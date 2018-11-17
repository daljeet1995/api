<?php
include('includes/connection.php');
header('content-type:application/json');

$actionName = $_POST["actionName"];

  if($actionName == "image"){

if(isset($_FILES['uploadfile'])){
    $filename = $_FILES['uploadfile']['name'];
   // echo $filename;die();
    $tempname = $_FILES['uploadfile']['tmp_name'];
   // echo $tempname;die();
    $folder = "images/". $filename;
   
   // get the image extension
   $extension = substr($filename,strlen($filename)-4,strlen($filename));
   // allowed extensions
   $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
   if(!in_array($extension,$allowed_extensions))
    {
    $myArr = array('status' => 'false', 'message' => 'Invalid format. Only jpg / jpeg/ png /gif format allowed');
      echo json_encode($myArr);
   }
else{
    move_uploaded_file($tempname,$folder);
    // echo "<img src='$folder' height='100' width='100'>";

    $sql = "INSERT INTO deal_img (image) VALUES ('$folder')";

if ($row = mysqli_query($conn, $sql)) {
	$postData[] = $row;

    $resultData = array('status' => 'true', 'message' => 'UPLOAD SUCCESSFULLY');
} else {
    $resultData = array('status' => 'false', 'message' => 'No Post(s) Found...');
}

echo json_encode($resultData);
 }
}
}

?>