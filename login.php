<?php
   include('includes/connection.php');
 header('content-type:application/json');

 // Facebook login

 $actionName = $_POST["actionName"];
 
 if($actionName == "facebook"){
    
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : '';
	$email = isset($_POST["email"]) ? $_POST["email"] : '';
	$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : '';
	$password = isset($_POST["password"]) ? md5($_POST["password"]) : '';
	
	
 
	if(!empty($full_name) && !empty($email) && !empty($mobile) && !empty($password)){
		$query = "INSERT INTO admin (full_name, email, mobile ,password) VALUES( '$full_name', '$email', '$mobile', '$password')";
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
}

 // Google login

 if($actionName == "google"){
    
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : '';
	$email = isset($_POST["email"]) ? $_POST["email"] : '';
	$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : '';
	$password = isset($_POST["password"]) ? md5($_POST["password"]) : '';
	
	
 
	if(!empty($full_name) && !empty($email) && !empty($mobile) && !empty($password)){
		$query = "INSERT INTO admin (full_name, email, mobile ,password) VALUES( '$full_name', '$email', '$mobile', '$password')";
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
}




?>