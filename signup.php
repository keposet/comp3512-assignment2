<?php
include('helper.inc.php');
include('config.php');

session_start(); 
?>
<html>
    <script src="js/signup.js"></script>
    <head>
        <meta charset="utf-8"/>  
        <title>Login</title>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
        <link rel="stylesheet" href="css/signup.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <?php include 'header.inc.php'; ?>
    <main class="grid-container">
        <form method="set" action="signup.php">
            <h1>Sign up</h1>
            <label for="FName">First Name</label>
            <input type="text" name="FName" Placeholder="First Name"/>
            <label for="LName">Last Name</label>
            <input type="text" name="LName" Placeholder="Last Name"/>
            <label for="City">City</label>
            <input type="text" name="City" Placeholder="City"/>
            <label for="Country">Country</label>
            <input type="text" name="Country" Placeholder="Country"/>
            <label for="Email">Email</label>
            <input type="text" name="Email" Placeholder="Email"/>
            <label for="Pword">Password</label>
            <input type="text" name="Pword" Placeholder="Password"/>
            <label for="ConPow">Confirm Password</label>
            <input type="text" name="ConPow" Placeholder="Confirm Passwor"/>
            <button type="submit">Sign Up</button>
        </form>
    </main>
    <script src="js/menu2.js"></script>
    </body>
</html>