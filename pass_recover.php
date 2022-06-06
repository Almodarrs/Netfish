<?php
// includes the header where contain the logo and the buttons 
include "header.html";
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="passform">
        
<!-- this the form where the info will be send to the page send email using post method  -->
<form action="send_email.php" method="POST">
    
<label>Gebruikersnaam of e-mail adres:</label>
 <input type ="text" name="email">
    
<br>
    <input style="cursor:pointer" type="submit" name="submit" value="Reset">
   
</form>
</div>
</body>
</html>
