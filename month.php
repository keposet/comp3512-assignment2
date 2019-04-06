<?php 
$symbol = $_GET["sym"];
?>

<html>
<head>
    <meta charset="utf-8"/>  
    <title>Home</title>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <script src="js/month.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/month.css">
</head>
<body>
<?php include 'header.inc.php'; ?>
<main class="grid-container">
    <section id=MonthTableParent>
    <h2>Monthly Stock Data</h2>
    <!--symbol set and retreaved by js-->
    <p id="symbol" value="<?=$symbol?>" ><?=$symbol?></p>
    <table id ="tableHeading" >
        <tr id="stockHeadings">
            <th id="dateHeading" class="date">Date</th>
            <th id="openHeading" class="open">Open</th>
            <th id="highHeading" class="high">High</th>
            <th id="lowHeading" class="low">Low</th>
            <th id="closeHeading" class="close">Close</th>
        <th id="volumeHeading" class="volume">Volume</th></tr>
    </table>
    </section>
</main>  
<!--<script src="js/main.js"></script>-->

<script src="js/menu2.js"></script>
</body>
</html>