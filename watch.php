<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
    <body >

<?php
// here it will include the database connection and then it will start the session
include "dbcon.php";
session_start();
// it will check if he the user is logged in and he is not an admin 
if(!isset($_SESSION["username"]) &&  @$_SESSION["is_admin"] != "0"){
    include "header.html";
    header("location:login.php");
      
       } else{
        //  if he is logged in then he can watch the selected video 
        include "header_logout.html";
        if (isset($_GET['id'])){
  
          $id = $_GET['id'];
          $sql = "SELECT * FROM `movie` WHERE id =$id";
          $stmt=$db->query($sql);
          $movie=$stmt->setFetchMode(PDO::FETCH_ASSOC);


          while ($movie = $stmt->fetch()) {
          $url = $movie['url'];
          $title = $movie['title'];
          $description = $movie['description'];
          $cover = ("images/".$movie['cover']);
           echo "<div class='container'> <div class='description'><h2> Je bent aan het kijken: ".$title."</h2><br>
           <h3>Beschrijving:</h3><p>".$description."</p></div>"; ?>
          <div class="vid_player">
              
           <video  width="615" height="315" controls>
               <source src="videos/<?php echo $url; }?>" type="video/mp4">
          
          </video>
          </div>
         
          </div>
          
    <div class="backgroundimage" style="background-image:url('<?php echo $cover?>')"> </div>
          <?php 

  } }

      
    
    

?>


   <div class="footer"> 
<?php
// here he can select from the whole videos so he can watch it 
$sql = "SELECT * FROM `movie`";
$stmt=$db->query($sql);
$movie=$stmt->setFetchMode(PDO::FETCH_ASSOC);
   while ($movie = $stmt->fetch()) {
       $id = $movie["id"];
       $title = $movie["title"];
       $cover = ("images/".$movie['cover']);

?>

<?php 
echo "<div class='movie_container'>
   <a href='watch.php?id=$id'>
   <img class='image' src='".$cover."'/></a>  
   <div class='middle'>  
     <div class='text'>'".$title."'</div>
  </div>
</div>";

}
?>

</div>


 

   


</body>
</html>