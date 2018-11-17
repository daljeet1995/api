<?php
  include('includes/connection.php');
 header('content-type:application/json');
 // start session
    session_start();

  $actionName = $_POST["actionName"];
  // login new

   if($actionName == "loginNew"){
   
 // $email = $_POST['email'];
 // $password =  base64_encode($_POST['password']);

 $email = isset($_POST["email"]) ? $_POST["email"] : '';
 $password = isset($_POST["password"]) ? base64_encode($_POST["password"]) : '';

 // $token = bin2hex(openssl_random_pseudo_bytes(16));
 // create unique token
        $form_token = uniqid();
        // commit token to session
        $_SESSION['user_token'] = $form_token;
	//$t=$SecretKey.$token;
 $expires = new DateTime('NOW');
 $expires->add(new DateInterval('PT01H')); // 1 hour

 $query = "select * From admin where email='$email' && password='$password' ";
 $data = mysqli_query($conn,$query);
 $total = mysqli_num_rows($data);
  if($total == 1){
    $postData = array();
  	while($row = mysqli_fetch_assoc($data)){
      $row['token']=$_SESSION['user_token'];
     // echo $row['token'];die();
            $postData[] = $row;
        }
  // header('location:home.php');
     $resultData = array('status' => 'True', 'postData' => $postData);
  }else{
    $resultData = array('status' => 'false', 'message' =>'Login Failed'); 
  }
}
 
 echo json_encode($resultData);

?>