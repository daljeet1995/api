<?php
 include('includes/connection.php');
 header('content-type:application/json');

 $actionName = $_POST["actionName"];

 if($actionName == "pickupInsert"){
    
    $pickup_address = isset($_POST["pickup_address"]) ? $_POST['pickup_address'] : '';
    //echo $pickup_address;die();
	$pickup_pincode = isset($_POST["pickup_pincode"]) ? $_POST["pickup_pincode"] : '';
	$floor = isset($_POST["floor"]) ? $_POST["floor"] : '';
	$BHK_Status = isset($_POST["BHK_Status"]) ? ($_POST["BHK_Status"]) : '';
	$parking_facility = isset($_POST["parking_facility"]) ? ($_POST["parking_facility"]) : '';
	
 
	if(!empty($pickup_address) && !empty($pickup_pincode) && !empty($floor) && !empty($BHK_Status)){
        $query = "INSERT INTO booking (pickup_address, pickup_pincode, floor ,BHK_Status,parking_facility) VALUES( '$pickup_address', '$pickup_pincode', '$floor', '$BHK_Status','$parking_facility')";
		$result = mysqli_query($conn, $query);
		// echo $result;die();
		if($result){
		    $resultData = array('status' => 'True', 'message' => 'Inserted Successfully...');
	    }else{
	    	$resultData = array('status' => 'False', 'message' => 'Can\'t able to insert new post...');
	    }
	}
	else{
    	$resultData = array('status' => 'False', 'message' => 'Please enter post details...');
    }
 
    echo json_encode($resultData);
}

?>