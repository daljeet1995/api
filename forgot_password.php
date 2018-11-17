<?php
include('includes/connection.php');
header('content-type:application/json');

$actionName = $_POST["actionName"];

  if($actionName == "forgotPassword"){

$email=$_REQUEST["email"];
// echo $email;die();
$query=mysqli_query($conn,"select * from admin where email='$email'");
$row =mysqli_fetch_array($query);
// print_r($row);die();
//echo $row["password"];die();
//echo base64_decode($row["password"]);die();

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "ds7078805@gmail.com";
  $mail->Password = "9910931651";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "ds7078805@gmail.com";
  $mail->FromName = "daljeet";
  
  $mail->addAddress($row["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "Dolly App Forgot Password";
  $mail->Body = "<B>This is your Password: </B>".base64_decode($row["password"]);
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   $resultData = array('STATUS' => "True", 'MESSAGE' => 'Message has been sent successfully');
  }
}
 echo json_encode($resultData);

?>

