<?php
// it will include the database connection file
require 'dbcon.php';

// it will check the if the get info is not empty to prevent errors
if(!empty ($_GET['movieid'])){
// here it will delete the movie bassed on the id 
$id=$_GET['movieid'];
$sql = "DELETE FROM movie WHERE id=:movieid";
        $stmt = $db->prepare($sql);
       $stmt_exec= $stmt->execute(array(":movieid"=>$id));
        if ($stmt_exec) {
            echo '<script>alert("Verwijdered")</script>';
        }
        else {
          echo "fail!!!! please try again";
        }
 header("refresh:0.3;admin_dashboard.php");
    }
?>