<?php 
include('__functions.inc.php');
//display logo, symbol name, remove btn 
//only in the php
//symbol and name link to single-company

// verify the things exist!!
$display= FALSE;

if(checkSet($_GET['ra'])){wipeFav();}

if(checkSet($_GET['r'])){
    $remSym = $_GET['r'];
    $fav = $_SESSION['fav'];
    unset($fav["$remSym"]);
    wipeFav();
    $_SESSION['fav'] = $fav;
}

if(!checkset($_SESSION['id'])){
    header('Location: login.php');
}

if(checkSet($_SESSION['fav'])){
    
     $fav = $_SESSION['fav'];
}else{$_SESSION['fav'];}

if(checkSet($_GET['sym']) && checkSet($_GET['name'])){
    $sym =$_GET['sym']; 
    $name =$_GET['name'];
    $fav = $_SESSION['fav'];
    $fav["$sym"] = $name;    
    wipeFav();
    $_SESSION['fav'] =$fav;
} 
else{
    $sym=FALSE;
    $name=FALSE;
}

?>

<html>
<head>
    <meta charset="utf-8"/>  
    <title>Favorites</title>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/portfolio.css">
        
    <!--<link rel="stylesheet" href="css/lab12-test01.css">-->
</head>
<body>
    <?php include 'header.inc.php'; ?>
    <div class="grid-container">
    <div class="container3">
    <h1>Favorites</h1>
    <ul>
        <?php
        
        if(sizeof($fav)> 0){
            foreach($fav as $sym => $name){
                echo "<img src=./logos/$sym.svg class='pimg'></img>";
                echo "<a href=single-company.php?sym=$sym>$sym</a>";
                echo "<a href=single-company.php?sym=$sym>$name</a>";
                echo "<a href=favorites.php?r=$sym><button>Remove</button></a>";
                }
        }
            ?>
        
    </ul>
     <a href="favorites.php?ra=y"><button>Remove All</button></a>
    <script src="js/menu2.js"></script>
    </div>
    </div>
</body>
</html>