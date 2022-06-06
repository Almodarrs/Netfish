<?php

// includes the database connection file 
include "dbcon.php";

// checking if the there is a password entered and submited 
if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
  
  /* based on the user email the old password will be updated to the new password 
  if it's done the a message success will be shown and he will be redirected to the login page 
  */
  $usr_email=$_POST['email'];
  $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);

  $stmt = $db->prepare("UPDATE user SET `password`='$pass'where `email`='$usr_email'");
    
    $stmt->execute([ $_POST['password'],$_POST['email']]);

    echo "het is gelukt!!!";
header("refresh:1;login.php");
  
}
?>