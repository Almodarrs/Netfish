<?php
//here it include the database file so it will connect with the database
include "dbcon.php";

// Here it will start the session and it will check if the user is logged in 
session_start();
if(!isset($_SESSION["username"]) &&  @$_SESSION["is_admin"] != "0"){
    include "header.html";
   
      
       } else{

           /* if he is logged in then the header button log in will be changed to log out and he will 
         redirected to another page so he can play videos */
        include "header_logout.html";
        header("location:watch.php");
       }


      
    
    

?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
    
<?php

//here it will get it will get all the information from movies table and then fetch the information needed to be shown
$sql = "SELECT * FROM `movie`";
$stmt=$db->query($sql);
$movie=$stmt->setFetchMode(PDO::FETCH_ASSOC);
   while ($movie = $stmt->fetch()) {
       $id = $movie["id"];
       $title = $movie["title"];
       $cover = ("images/".$movie['cover']);

?>

<?php 

/* here it will show the movie with it's image cover and when hover on it the name of the movie will appear plus when click on it will
send the id to another page so the video can be played */

echo "<div class='movie_container'><a href='watch.php?id=$id'>
<img class='image' src='".$cover."'</a>
<div class='middle'>
<div class='text'>'".$title."'</div>
</div>
</div>";

}
?>


 

   


</body>
</html>
