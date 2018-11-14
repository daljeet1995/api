<?php
  include('includes/connection.php');
 header('content-type:application/json');

 $actionName = $_POST["actionName"];
 
if($actionName == "selectPost"){
	$seachKey = isset($_POST["seachKey"]) ? $_POST["seachKey"] : '';
 
	if(!empty($seachKey))
		$query = "SELECT * FROM admin where full_name like '%$seachKey%' ORDER BY id ASC";
	else
		$query = "SELECT * FROM admin ORDER BY id ASC";
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

  // Sign up

if($actionName == "insertPost"){
    
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : '';
	$email = isset($_POST["email"]) ? $_POST["email"] : '';
	$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : '';
	$password = isset($_POST["password"]) ? base64_encode($_POST["password"]) : '';
	
	
 
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
 
  // login

 if($actionName == "loginPost"){
	
	$query = "SELECT id,email, password FROM admin ORDER BY id ASC";
	$result = mysqli_query($conn, $query);
 
	$rowCount = mysqli_num_rows($result);
 
	if($rowCount > 0){
		$postData = array();	
	    while($row = mysqli_fetch_assoc($result)){
	    	$postData[] = $row;
	    }
	    $resultData = array('status' => True, 'postData' => $postData);
    }else{
    	$resultData = array('status' => false, 'message' => 'No Post(s) Found...');
    }
 
    echo json_encode($resultData);
}

 // forgot password


?>




















