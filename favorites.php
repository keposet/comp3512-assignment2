<?php 
//displayh logo, symbol name, remove btn 
//only in the php
//symbol and name link to single-company
session_start(); 
// unset($_SESSION['fav']);

function checkSet($uData, $scriptVar){
    if(isset($uData) && sizeof($uData) > 0){
        $scriptVar = $uData;
    }else {
        $scriptVar = false;
    }
    return $scriptVar;
}

$remItem = checkSet($_GET['rem'], $remItem);
if($remItem){
    //find matching symbol, pop, reload. 
}


//only add these if they are set



if(isset($_SESSION['fav']) && sizeof($_SESSION['fav']) > 0 ){
    $favArray = $_SESSION['fav'];
}else {
    $_SESSION['fav'] = array();
    $favArray = $_SESSION['fav'];    
}

$sym = checkSet($_GET["sym"], $sym);
$name = checkSet($_GET["name"], $name);
if ($sym && $name){
  array_push($_SESSION['fav'], [$sym, $name]);
  $one = $_SESSION['fav'];
  $oneone = $one[0];
  echo $oneone[1];
  array_values($one);
}
//want to overwrite the arry every time
// wonder if i could just do the push 


//array_push($_SESSION['fav'], array($sym, $name));
//$_SESSION["fav"] = $favArray;
//$favArray = $_SESSION['fav'];
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
            foreach($favArray as $i => $fD){ 
            $fD[0]=$fSym;
            $fD[1]=$fNam;
            ?>
                <!--logo, symbdol/name as link, remove btn, -->
                <img src="./logos/<?=$fSym?>"></img>
                <a href="single-company?sym=<?=$fSym?>"><?=$fSym?></a>
                <a href="single-company?sym=<?=$fNam?>"><?=$fNam?></a>
                <form method=get action=favorites.php?rem=<?=$fSym?>>
                    <input type="submit" value="Remove"/>
                </form>
                
            
        <?php }?>
        
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