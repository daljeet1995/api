<?php
 include('includes/connection.php');
 header('content-type:application/json');

 $actionName = $_POST["actionName"];

 if($actionName == "dropupInsert"){
    
    $drop_location_address = isset($_POST["drop_location_address"]) ? $_POST['drop_location_address'] : '';
    //echo $pickup_address;die();
	$drop_pincode = isset($_POST["drop_pincode"]) ? $_POST["drop_pincode"] : '';
	//echo $drop_pincode;die();
	$drop_floor = isset($_POST["drop_floor"]) ? $_POST["drop_floor"] : '';
	$drop_parking = isset($_POST["drop_parking"]) ? ($_POST["drop_parking"]) : '';
	
 
	if(!empty($drop_location_address) && !empty($drop_pincode) && !empty($drop_floor)){
        $query = "INSERT INTO booking (drop_location_address, drop_pincode, drop_floor ,drop_parking) VALUES( '$drop_location_address', '$drop_pincode', '$drop_floor', '$drop_parking')";
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

 // insert lat or lng
  if($actionName == "latlng"){
    
    $lat = isset($_POST["lat"]) ? $_POST['lat'] : '';
    //echo $pickup_address;die();
	$lng = isset($_POST["lng"]) ? $_POST["lng"] : '';
	//echo $drop_pincode;die();
	
	
 
	if(!empty($lat) && !empty($lng) ){
        $query = "INSERT INTO booking (lat, lng) VALUES( '$lat', '$lng')";
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