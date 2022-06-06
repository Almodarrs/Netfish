<?php
// here including the database connection file
include "dbcon.php";
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    /* using if condition to check if the required information are being sent 
    then if it is sent it will select from the table user based on his entered email
    and a new email will be sent to him with a link
*/
if(isset($_POST['submit']) && $_POST['email']){
$usr_email = $_POST['email'];
    $sql = "SELECT * FROM `user` WHERE email='$usr_email'";
    $stmt=$db->query($sql);
    $email=$stmt->setFetchMode(PDO::FETCH_ASSOC);
       while ($email = $stmt->fetch()) {
           $id = $email["id"];
           $usr_email = $email["email"];
           $pass = password_hash($email['password'], PASSWORD_DEFAULT);
           $usr_name = $email['name'];

} 

$link = "<a href='https://localhost/Netfish/reset_password.php?key=".$usr_email."&reset=".$pass."'>Klik om wachtwoord opnieuw in te stellen</a>'";
require 'vendor/autoload.php';

    $mail = new PHPMailer(true);
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "4d5b5db9aea0ba";
    // GMAIL password
    $mail->Password = "780132104c6b94";
    $mail->SMTPSecure = "tls";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.mailtrap.io";
    // set the SMTP port for the GMAIL server
    $mail->Port = 587;
    $mail->From='Support@netfish.com' ;
    $mail->FromName= 'NETFISH' ;
    $mail->AddAddress($usr_email, $usr_name);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = '<h3>Geachte heer/mevrouw,</h3>
   <p> U heeft verzocht uw wachtwoord te wijzigen, dit kan via de volgende url:</p><br>'
    .$link.'
   <p> Met vriendelijke groet,</p>
    <p>NETFISH</p>';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
      // header("refresh:2; login.php");
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
?>