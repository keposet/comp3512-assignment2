<?php 
    include('__functions.inc.php');
    include('helper.inc.php');
    // add in the database call, and change based on query string sent to this page.
if(checkSet($_GET['name'])){
    $name = $_GET['name'];}
if(checkSet($_GET['sector'])){
    $sector = $_GET['sector'];}
if(checkSet($_GET['subindustry'])){
    $subInd = $_GET['subindustry'];}
if(checkSet($_GET['address'])){
    $address = $_GET['address'];}
if(checkSet($_GET['exchange'])){
    $exch = $_GET['exchange'];}
if(checkSet($_GET['website'])){
    $website = $_GET['website'];}
if(checkSet($_GET['symbol'])){
    $sym= $_GET['symbol'];
}
    $stmt = "UPDATE `companies` SET `symbol`=:sym,`name`=:nam,`sector`= :sec,`subindustry`= :subi,`address`= :add,`exchange`= :exc,`website`= :web WHERE symbol = :sym";
    $binds = [
        ':sym'=> $sym,
        ':nam'=> $name,
        ':sec'=> $sector,
       ':subi'=> $subInd,
        ':add'=> $address,
        ':exc'=> $exch,
        ':web'=> $website,
        ];
    sqlBindResult($stmt, $binds);

    // redirect to the single company page.
    // redirect to proper symbol page. 
    $string = "single-company.php?sym=".urlencode($sym)."&edit=yep";
    header("Location: $string");
?>