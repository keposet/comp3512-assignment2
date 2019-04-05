<?php
include('__functions.inc.php');
    $symbol = $_GET["sym"];

?>

<html>
    <head>
    <meta charset="utf-8"/>  
    <title>Single Comp</title>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/portfolio.css">
    
        
    </head>
    <body>
        <?php include 'header.inc.php'; ?>
        <main class="grid-container">
            <div class="container3">
            <h1>Company</h1>
            <div id="saveMsg" >
                <?php if(isset($_GET["edit"])) { ?>
                <p>The Company Data has been Updated</p>
                <?php } ?>
            </div>
            <div id="companySymbol">
                <img src="logos/<?php echo $symbol; ?>.svg" />
            </div>
            <!--p tag for symbol moved into for because symbol is needed for database call -->

            <form method="get" action="save.php">
                <label for="symbol">Symbol:<p id="sym" value="<?php echo $symbol; ?>"><?php echo $symbol; ?></p></label>
                <input readonly class="compInput" name="symbol" id="symbolEntry" value=<?=$symbol?> >
                <br>
                <label for="name">Name: <p class="dataInput" id="name"></p></label>
                <input class="compInput" id="nameEntry" type="text" name="name" placeholder="">
                <br>
                
                <label for="sector">Sector: <p class="dataInput" id="sector"></p></label>
                <input class="compInput" id="sectorEntry" type="text" name="sector" placeholder="">
                <br>
                
                <label for="subindustry">Sub Industry: <p class="dataInput" id="subindustry"></p></label>
                <input class="compInput" id="subindustryEntry" type="text" name="subindustry" placeholder="">
                <br>
                
                <label for="address">Address: <p class="dataInput" id="address"></p></label>
                <input class="compInput" id="addressEntry" type="text" name="address" placeholder="">
                <br>
                
                <label for="exchange">Exchange: <p class="dataInput" id="exchange"></p></label>
                <input class="compInput" id="exchangeEntry" type="text" name="exchange" placeholder="">
                <br>
                
                <label for="website">Website: <p class="dataInput" id="website"></p></label>
                <input class="compInput" id="websiteEntry" type="text" name="website" placeholder="">
                <br>
                
                <button id="edit" type="button">Edit</button>
                <button id="addFavourite" type="button">Add to Favourites</button>
                
                <a href="month.php?sym=<?=$symbol?>"><button id="stock" type="button">Month $</button></a>
                
                <button id="save" type="submit">Save</button>
                <button id="cancel" type="button">Cancel</button>
            </form>
        </main>

        <script src="js/menu2.js"></script>
        <script src="js/single.js"></script>
        <script type='text/javascript' source='js/single.js'>
     let p = "<?php echo $symbol?>";
     
     this.loadCompanyData(`${p}`);</script>
            <!--java script for getting the single company info-->
    </div>  
    </body>
</html>