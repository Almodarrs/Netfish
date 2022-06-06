<?php
// it will include the database connection file and then it will containg the header with logo and busttons
include "dbcon.php";
include "header_logout.html";

?>


<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <div class="admin_container">
            <a style="color:white; text-align: right; font-size: 30px"href="add_movie.php"> Toevoegen </a>
<?php
// here it will select all the inforamtion from table movie to show the required information 
 $sql = "SELECT * FROM `movie`";
 $stmt=$db->query($sql);
$movie=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($movie = $stmt->fetch()) { ?>

        <div class="movie_table">
<table>
    <tr> 
    <th> Jaar: &nbsp &nbsp &nbsp</th> </br> 
    <th> Titel: &nbsp &nbsp  &nbsp</th>
    <th> Actie: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</th>
 </tr>

    <tr>
    <td> <?php echo $movie["year"];?>&nbsp &nbsp &nbsp &nbsp</td>
    <td> <?php echo $movie["title"];?>&nbsp &nbsp &nbsp &nbsp</td>
    <td> <button onclick="location.href='delete.php?movieid=<?=$movie['id']?>'"> Verwijderen </button> &nbsp &nbsp &nbsp &nbsp</td>
    </tr>
    </table>
    </div>
<?php
    }
?>
</div>

</body>
</html>