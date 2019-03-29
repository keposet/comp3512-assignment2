<?php
    session_start();
    include('helper.inc.php');
    $id = $_SESSION['id'];
    $sql1 = "SELECT symbol, amount FROM portfolio WHERE userId = '4'";
    $dbResult1 = sqlResult($sql1);
    $dbInfo = $dbResult1 -> fetchAll();
    $SA=[];
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
    echo $str;
    $website = "https://api.iextrading.com/1.0/stock/market/batch?symbols=$str&types=price";
    $file = file_get_contents($website);
    $fileArray = json_decode($file, true);
    echo $fileArray['C']['price'];
    $pValue = 0;
    /*for($i = 0; $i < count($dbFetchSym); $i++){
    $sql2 = "SELECT name FROM countries WHERE symbol ='" . $dbFetchSym[i] . "'";
    $dbResult2 = sqlResult($sql2);
    $dbInfo = $dbResult2 -> fetch();
    echo "<tr>";
    echo "<td><img src='logos/" . $dbFetchSym[$i] . ".svg'></img></td>";
    echo "<td>" . $dbFetchSym[$i] . "</td>";
    echo "<td>" . $dbInfo[0] . "</td>";
    echo "<td>" . $dbFetchAmt[$i] . "</td>";
    echo "<td id='cp" . $i . "'>""</td>";
    
    }*/
    
    /*$file = file_get_contents($website);
    header('Content-type: application/json');*/
?>
<html>
    <head>
        <meta charset="utf-8"/>  
        <title>Portfolio</title>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
        <link rel="stylesheet" href="css/portfolio.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <?php include 'header.inc.php'; ?>
    <main class="grid-container">
        <table>
            <tr>
                <th>Logo</th>
                <th>Symbol</th>
                <th>Name</th>
                <th>Number of Shares</th>
                <th>Close Price</th>
                <th>Total Value</th>
            </tr>
            <?php foreach($dbInfo as $i){ 
            $sql2 = "SELECT name FROM companies WHERE symbol = '" . $i['symbol'] . "'";
            $dbResult2 = sqlResult($sql2);
            $dbInfo = $dbResult2 -> fetch(); 
            $pValue += $i['amount']*$fileArray[$i['symbol']]['price']
            ?>
            <tr>
                <td><img src="logos/<?=$i['symbol']?>.svg"></img></td>
                <td><?=$i['symbol']?></td>
                <td><?=$dbInfo[0] ?></td>
                <td id="amt<?=$i ?>"><?=$i['amount'] ?></td>
                <!--gonna fill innerhtml of line 57, 58, and 60 using JS-->
                <td class="cp" id="cp<?=$i['symbol']?>"><?='$' . number_format($fileArray[$i['symbol']]['price'],2,".","") ?></td>
                <td class="tv"id="tv<?=$i['symbol']?>"><?='$' . number_format($i['amount']*$fileArray[$i['symbol']]['price'],2,".",",") ?></td>
            </tr>
            <?php } ?>
        </table>
        <span id="tpv">Total Portfolio Value:<?php echo '$' . number_format($pValue,2,".",",")?> </span>
    </main>
    <script type="text/javascript" src="css/portfolio.js"></script>
    </body>
</html>