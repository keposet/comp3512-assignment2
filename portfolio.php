<?php
session_start();
include('helper.inc.php');
include('__functions.inc.php');
    $_SESSION['portfolio'] = [];
    $id = $_SESSION['id'];
    $port = $_SESSION['portfolio'];
    $sql1 = "SELECT symbol, amount FROM portfolio WHERE userId = :id";
    $bind = array(':id' => $id);
    $dbResult1 = sqlBindResult($sql1, $bind);
    $dbInfo = $dbResult1 -> fetchAll();
    if(!empty($dbInfo)){
        $SA=[];
        //creation of string of multiple parameters to pass onto file_get_contents
        foreach($dbInfo as $i){
            array_push($SA, $i['symbol']);
        }
        $str ="";
        for($i=0;$i<sizeof($SA);$i++){
            if ($i==0){
                $str .= $SA[$i];
            }else{
                $str .= "," . $SA[$i];
            } 
        }
        //turning information into json
        $website = "https://api.iextrading.com/1.0/stock/market/batch?symbols=$str&types=price";
        $file = file_get_contents($website);
        $fileArray = json_decode($file, true);
    }
?>
<html>
    <head>
        <meta charset="utf-8"/>  
        <title>Portfolio</title>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
        <link rel="stylesheet" href="css/portfolio.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/portfolio.js"></script>
    </head>
    <body>
    <?php include 'header.inc.php'; 
    if(empty($dbInfo)){
        echo "<span id='np'><h2>You currently have an empty portfolio</h2></span>";
    } else {?>
    <main class="grid-container">
        <div class="container3">
        <h1>Portfolio</h1>
        <table id="portfolioTable">
            <tr>
                <th>Logo</th>
                <th>Symbol</th>
                <th>Name</th>
                <th>Number of Shares</th>
                <th>Close Price</th>
                <th>Total Value</th>
            </tr>
            <!--loops through the returned data and creates the table with it-->
            <?php foreach($dbInfo as $i){ 
            $sql2 = "SELECT name FROM companies WHERE symbol = :" . $i['symbol'];
            $bind = array(':'.$i['symbol'] => $i['symbol']);
            $dbResult2 = sqlBindResult($sql2, $bind);
            $dbInfo2 = $dbResult2 -> fetch();
            $amt = $i['amount'];
            $sym = $i['symbol'];
            $total = $amt*$fileArray[$sym]['price'];
            $cp = $fileArray[$sym]['price']*1;
            $pValue += $total;
            ?>
            <?php if(array_key_exists($i['symbol'], $_SESSION['portfolio'])) { ?>
            <script> update(<?=$amt?>,<?=$total?>, "<?=$sym?>"); </script>
            <?php } else { ?>
            <tr>
                <td><a href="single-company.php?sym=<?=$sym?>"><img src="logos/<?=$sym?>.svg" class="pimg"></img></a></td>
                <td class="symbol"><a href="single-company.php?sym=<?=$sym?>"><?=$sym?></a></td>
                <td><?=$dbInfo2['name']?></td>
                <td id="amt<?=$sym?>"><?=$amt?></td>
                <td id="cp<?=$sym?>">$<?=number_format($cp,2,".",",") ?></td>
                <td class="tv" id="tv<?=$sym?>"><?=$total ?></td>
            </tr>
            <?php
            $company = [];
            $port[$sym] = $company;
            $_SESSION['portfolio'] = $port;
            ?>
            <?php } }}?>
        </table>
        <span id="tpv"></span>
    </div>
    </main>
    <script src="js/menu2.js"></script>
    </body>
</html>