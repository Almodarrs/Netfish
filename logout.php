<?php

// this will end the session when the user clicks on logout
session_start();
session_destroy();
header('location: login.php');
?>