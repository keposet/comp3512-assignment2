<?php 
session_start(); 

$sym = $_GET["sym"];
$name = $_GET["name"];

// $arrayVal = 
$favArray = array();
array_push($favArray, array($sym, $name));

?>

<html>
<head>
    <meta charset="utf-8"/>  
    <title>Favorites</title>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <link rel="stylesheet" href="css/main.css">
        
    <!--<link rel="stylesheet" href="css/lab12-test01.css">-->
</head>
<body>
    <?php include 'header.inc.php'; ?>
    <h1>Favorites</h1>
    <ul>
        
    </ul>
    <?php echo $favArray[0][0] ?>
    <?php echo $favArray[0][1] ?>
    <?php echo $favArray[1][1] ?>
    <?php echo $favArray[1][1] ?>
    
    <script src="js/menu2.js"></script>
</body>
</html>