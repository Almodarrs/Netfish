<?php

// here it will include the database connection file and it will include the header with logo and busttons
include_once("dbcon.php");
include "header.html";
  // if submit button is clicked it will check it and then it will get the information and it will insert to the table user
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $admin = 0;


    $sql = "INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`,`is_admin`) 
                VALUES (NULL, :name, :username, :email, :password, :admin)";
    $stmt = $db->prepare($sql);
    $userArray = array( "name"=>$name, 
                        "username"=>$username,
                        "email"=>$email, 
                        "password"=>$password,
                        "admin"=>$admin
                        );                            
    $stmt->execute($userArray);
    // als het gelukt is ga verder

    echo "<script>location.href='login.php';</script>";

}

?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="rgstrform">
<!-- the registration form  -->
<form action="" method="POST">
<label>Naam:</label> 
<input style="background:transparent; border-color:white; color:white;" type ="text" name="name" vlaue="name" placeholder="naam" required>
<label>Gebruikersnaam:</label> 
<input style="background:transparent; border-color:white; color:white;" type ="text" name="username" vlaue="username" placeholder="" required>
<label>E-mail adres: </label>
<input style="background:transparent; border-color:white; color:white;" type ="text" name="email" vlaue="email" placeholder="" required>
  <label>Wachtwoord: </label>
  <input style="background:transparent; border-color:white; color:white;" type ="password" name="password" vlaue="password" required>
  <label> Wachtwoord ter controle:</label> 
  <input style="background:transparent; border-color:white; color:white;" type ="password" vlaue="re_password" required >
<br>

    <input style="cursor:pointer" type="submit" name="submit" value="Registreer">
</form>
</div>
</body>
</html>
