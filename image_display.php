<?php
  include('includes/connection.php');
 header('content-type:application/json');

 $actionName = $_POST["actionName"];
 
if($actionName == "imageDisplay"){
  $seachKey = isset($_POST["seachKey"]) ? $_POST["seachKey"] : '';
 
  if(!empty($seachKey))
    $query = "SELECT * FROM deal_img where image like '%$seachKey%' ORDER BY id ASC";
  else
    $query = "SELECT * FROM deal_img ORDER BY id ASC";
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
<!-- <img src='". $row["image"]."'>
<img src='". $row["image"]."' width='100' height='100' /> -->