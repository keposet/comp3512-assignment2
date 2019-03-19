<?php 
$symbol = $_GET["sym"];
?>

<html>
<head>
    <meta charset="utf-8"/>  
    <title>Home</title>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php include 'header.inc.php'; ?>
<main class="grid-container">
    <section>
    <h2>Month Stock Data</h2>
    <!--symbol set and retreaved by js-->
    <p id="symbol" value="<?=$symbol?>" ><?=$symbol?></p>
    <table id ="tableHeading" ></table>
    </section>
</main>  
<!--<script src="js/main.js"></script>-->
<script src="js/month.js"></script>
<script src="js/menu2.js"></script>
</body>
</html>