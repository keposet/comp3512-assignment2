<?php 
include('__functions.inc.php');
//displayh logo, symbol name, remove btn 
//only in the php
//symbol and name link to single-company

// verify the things exist!!

if(!checkSet($_SESSION['fav'])){ $_SESSION['fav']=array();}
if(checkSet($_GET['sym'])){$sym =$_GET['sym']; } else{$sym=FALSE;}
if(checkSet($_GET['name'])){$name =$_GET['name'];} else{$name=FALSE;}
// need to valimadate
// TODO

//fav is an index. and an index can point to another array. 
// soo i set a temp array to fav, add new key=>value, wipe fav, reset


$fav = $_SESSION['fav'];
$fav["$sym"] = $name;
wipeFav();
$_SESSION['fav'] =$fav;


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
        <?php
            foreach($fav as $sym => $name){
                echo "$sym => $name </br>";
            }
            
            ?>
                <!--logo, symbdol/name as link, remove btn, -->
                <img src="./logos/<?=$fSym?>"></img>
                <a href="single-company?sym=<?=$fSym?>"><?=$fSym?></a>
                <a href="single-company?sym=<?=$fNam?>"><?=$fNam?></a>
                <form method=get action=favorites.php?rem=<?=$fSym?>>
                    <input type="submit" value="Remove"/>
                </form>
                
        
    </ul>
    <?php echo $favArray[0][0] ?>
    <?php echo $favArray[0][1] ?>
    <?php echo $favArray[1][1] ?>
    <?php echo $favArray[1][1] ?>
     <form method=get action="favorites.php?remAll=1">>
                    <input type="submit" value="Remove All"/>
                </form>
    <script src="js/menu2.js"></script>
</body>
</html>