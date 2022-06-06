<?php
// here it will include the database connection file 
include "dbcon.php";

// it will check the information has been sent from button reset 
if($_GET['key'] && $_GET['reset'])
{
  $usr_email=$_GET['key'];
  $pass=$_GET['reset'];
  $sql = "SELECT `email`,`password` FROM `user` where email='$usr_email' and password='$pass'";
    $stmt=$db->query($sql);
    $email=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    if(count(array($email))==1) {
           
           
    ?>
    <!-- the new password form -->
    <form method="post" action="new_password.php">
    <input type="hidden" name="email" value="<?php echo $usr_email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input style="cursor:pointer" type="submit" name="submit_password">
    </form>
    <?php
  }}

?>