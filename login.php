<?php

include('helper.inc.php');
include('__functions.inc.php');
// just a basic login session for doing the pages this will have to be connect to the database later 

if(isset($_POST['Email']) && isset($_POST['Password'])){

    $email = $_POST['Email'];
    $password = $_POST['Password'];
    
    //working
    //$sql = "SELECT email, password, id FROM users WHERE email = '$email'";
    $sql = "SELECT email, password, id FROM users WHERE email = :email";
    $bind = array(':email' => $email);
    

    $dbResult = sqlBindResult($sql, $bind);
    $dbInfo = $dbResult -> fetch();// non object 
    
    $dbFetchId = $dbInfo['id'];
    $dbFetchPass = $dbInfo['password'];
    $dbFetchEmail = $dbInfo['email'];
    if(password_verify($password, $dbFetchPass) && $email == $dbFetchEmail) {// good catch Josh v big brain
        session_start();
        //this works 
        $_SESSION["id"] = $dbFetchId;
        $_SESSION["loggedIn"] = true;
        header("Location: index.php");
        //header("Location: test.php");
    } else {
        header("Location: login.php");
    }
}
?>

<html>
    <head>
        <meta charset="utf-8"/>  
        <title>Login</title>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
        <link rel="stylesheet" href="css/signup.css">
        <link rel="stylesheet" href="css/main.css">
        <script type="text/javascript" src=""></script>
    </head>
    <body>
    <?php include 'header.inc.php'; ?>
    <main class="grid-container">
        <form method="post" action="login.php">
            <h1>Login</h1>
            <label for="Email" >Email</label>
            <input type="text" name="Email" Placeholder="Email" value="hemmens0@de.vu"/>
            <label for="Password" >Password</label>
            <input type="text" name="Password" placeholder="Password" value="mypassword"/>
            <button type="submit" id="login-button">Login</button>
        </form>
        <form action = signup.php>
            <label for="signup">No Account?</label>
            <input type="submit" name="signup" value="Sign up"/>
        </form>
    </main>
    <script src="js/menu2.js"></script>
    </body>
</html>