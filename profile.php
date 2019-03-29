<?php
session_start();
include('helper.inc.php');
$id = $_SESSION["id"];
$sql = "SELECT firstname, lastname, email, city, country FROM users WHERE id ='$id'";
$rawdata = sqlResult($sql);
$data = $rawdata -> fetch();
?>
<html>
    <head>
        <meta charset="utf-8"/>  
        <title>Profile</title>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <?php include 'header.inc.php'; ?>
        <main class="grid-container">
            <span>Picture: </span><img src="https://randomuser.me/api/portraits/med/women/<?php echo $id?>.jpg"></img>
            <span>Name: <?php echo $data['firstname'] . " " . $data['lastname'] ?></span>
            <span>Email: <?php echo $data['email'] ?> </span>
            <span>City: <?php echo $data['city'] ?> </span>
            <span>Country: <?php echo $data['country'] ?> </span>
        </main>
        <!--<script type="text/javascript" src="js/profile.js"></script>-->
    </body>