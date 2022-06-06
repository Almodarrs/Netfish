<?php
// it will start the session
session_start();

// it will check the session information if it carries the requiede value 
// this also check if you are the admin
if(@$_SESSION["is_admin"]!="0" &&  !isset  ($_SESSION["username"])){
  include "header.html";
    echo "<br><p style='color:white;'> U heeft geen toegang tot deze pagina</p>";
    
     } elseif($_SESSION["is_admin"]=="0" ) {
      include "header_logout.html";
      echo "<br><p style='color:white;'> U heeft geen toegang tot deze pagina</p>";
     }else{
      include "header_logout.html";

      header("location:admin_dashboard.php");
     
    }
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        

</body>
</html>
