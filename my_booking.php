<?php
  include('includes/connection.php');
 header('content-type:application/json');

 $actionName = $_POST["actionName"];

  if($actionName == "myBooking"){
	
	$query = "SELECT id,name,rating,description,image,DATE(`timestamp`) FROM my_booking ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
 
	$rowCount = mysqli_num_rows($result);
 
	if($rowCount > 0){
		$postData = array();	
	    while($row = mysqli_fetch_assoc($result)){
	    	$postData[] = $row;
	    }
	    $resultData = array('status' => true, 'postData' => $postData);
    }else{
    	$resultData = array('status' => false, 'message' => 'No Post(s) Found...');
    }
 
    echo json_encode($resultData);
}
  

?>