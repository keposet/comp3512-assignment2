<?php 
   //removes the  session 
                    
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['loggedIn']);
    header("Location: index.php");
?>