<?php
include('helper.inc.php');
include('config.php');
// just a basic login session for doing the pages this will have to be connect to the database later 
session_start();
if(isset($_POST["Email"])&& isset($_POST["Password"])){
    
    // setting some session vars if password and email are correct this will
    // need to change and conncet to database, just for setting up pages and functionality 
    //sql for fetching usre id
    // change this into one sql and do the $row thing
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    
    
  //  $sqle = 'SELECT email FROM users WHERE email = ' . '"' .  $_POST["Email"] . '"';
    $sqle = "SELECT email FROM users WHERE email = '$email'";
    $sqlp = "SELECT password FROM users WHERE password = '$password'";
    
    echo "email: " . $email;
    
    echo "password: " . $password;
    $hashpass = password_hash($_POST['Password'], PASSWORD_BCRYPT, ['cost' => 12] );
    echo "hashpass: " . $hashpass;
    $dbpass = sqlResult($sqlp);
    //echo "dbpass: " . $dbpass;
    $remail = sqlResult($sqle);
   // echo "remail: " . $remail;
   /*
    if ($hashpass == $password_field_from_database_table && ) {
    // we have a match, log the user in
    }
    $sql = 'SELECT id FROM users WHERE email= ' . $_POST['Email'] . ' and password= ' . $_POST['Password'];
    $result = sqlResult($sql);
    
    $_SESSION["id"] = $result;
    $_SESSION["loggedIn"] = true;
    header("Location: index.php");*/
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
        <form method="post" action="login.php">
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