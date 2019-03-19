<?php

// just a basic login session for doing the pages this will have to be connect to the database later 
session_start();
if($_GET["Email"] == "bob" && $_GET["Password"] == "bob"){
    
    // setting some session vars if password and email are correct this will
    // need to change and conncet to database, just for setting up pages and functionality 
    $_SESSION["id"] = 1234;
    $_SESSION["loggedIn"] = true;
    header("Location: index.php");
}

?>

<html>
    <head>
        <meta charset="utf-8"/>  
        <title>Login</title>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <?php include 'header.inc.php'; ?>
    <main class="grid-container">
        <!--form input for logging in-->
        <form method="get" action="login.php">
            <h1>Login</h1>
            <label for="Email" >Email</label>
            <input type="text" name="Email" Placeholder="Email"/>
            <label for="Password" >Password</label>
            <input type="text" name="Password" placeholder="Password"/>
            <button type="submit">Login</button>
        </form>
        
    </main>
    <script src="js/menu2.js"></script>
    </body>
</html>