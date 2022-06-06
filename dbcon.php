<?php

//Databaseconfiguration
$dbHost="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="netfish";

try{


    $db= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUsername,$dbPassword);
    //setthePDOerrormodetoexception
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo"Connectedsuccessfully";
}catch(PDOException$e){

    echo"Connectionfailed:".$e->getMessage();
}

?>





