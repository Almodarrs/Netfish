<?php

// include the databse connection file and the header with logo and the buttons 
include "dbcon.php";
include "header_logout.html";

// if the button submit has been clicked then the it get the information and it will insert it to the database 
if(isset($_POST["submit"])){

    $name = $_FILES['cover']['name'];
    $tmp = $_FILES['cover']['tmp_name'];
    $title = $_POST["title"];
    $url = $_FILES['url']['name'];
    $url_tmp = $_FILES['url']['tmp_name'];
    $year = $_POST["year"];
    $description = $_POST["description"];

move_uploaded_file($tmp, "images/".$name);
move_uploaded_file($url_tmp, "videos/".$url);
// here it will it will insert all the sent information of the movie into the movie table
    $sql = "INSERT INTO `movie` (`id`, `title`, `url`, `year`, `description`,`cover`) 
                VALUES (NULL, :title, :url, :year, :description,:cover)";
    $stmt = $db->prepare($sql);
    $userArray = array( "title"=>$title, 
                        "url"=>$url,
                        "year"=>$year, 
                        "description"=>$description,
                        "cover"=>$name
                        
                        );                            
    $stmt->execute($userArray);
    // als het gelukt is ga verder

    echo '<script>alert("Toegevoegd")</script>';
    echo "<script>location.href='admin_dashboard.php';</script>";

}

?>


<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="admin_container">
            
<?php
  ?>

<div class="rgstrform">
<!-- the video adding form  -->
<form action="add_movie.php" method="POST" enctype="multipart/form-data">
<label>Titel:</label> 
<input style="background:transparent; border-color:white; color:white;" type ="text" name="title" required>
<label>Video-Url:</label> 
<input style="background:transparent; border-color:white; color:white;" type ="file" accept="video/*" name="url" required>
<label>Cover afbeelding: </label>
<input style="background:transparent; border-color:white; color:white;" type ="file" accept="image/*" name="cover" required>
  <label>Jaar:</label>
  <input style="background:transparent; border-color:white; color:white;" type ="text" name="year" required>
  <label> Beschrijving:</label> 
  <textarea style="background:transparent; border-color:white; color:white; height:5rem"  name="description"  required ></textarea>
<br>

    <input type="submit" name="submit" value="Toevoegen">
</form>
</div>
<?php
  
?>
</div>

</body>
</html>