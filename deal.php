<?php
  include('includes/connection.php');
 header('content-type:application/json');

 // $actionName = $_GET["actionName"];
    
    $query = "SELECT business_name,introduction,experience,professional,description	 FROM `deal` ORDER BY id ASC";
	//echo $query;die();
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

  

?>