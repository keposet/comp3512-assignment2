<?php
    $symbol = $_GET["sym"];

?>

<script>
            let companyList = [];
            let symbol = "<?php echo $symbol;?>";
            
            window.addEventListener('load', function() {
            
            const companies = '/comp3512-assignment2/services/companies.php?sym='+ symbol;
            fetch(companies)
            .then(response => response.json())
            .then(function (data) {
            companyList = data;
            singleComp(companyList);
            
            console.log(companyList);
        
            })
            .catch(error => console.error(error));
            
            // function for populating company information
            function singleComp(companyList){
            let varList = ["name", "sector", "subindustry", "address", "exchange", "website"];    
                
                for(let i = 0; i < companyList.length; i++){
                    for(let v = 0; v < varList.length; v++){
                        let compName = companyList[i][varList[v]];
                        let name = document.createTextNode(compName);
                        let selector = "#" + varList[v];
                        let inputSel = "#" + varList[v] + "Entry";
                        let input = document.querySelector(inputSel);
                        input.setAttribute("value", compName);
                        let comp = document.querySelector(selector);
                        comp.appendChild(name);
                    }
                }
 
            } 
                
            });
            </script>

<html>
    <head>
    <meta charset="utf-8"/>  
    <title>Single Comp</title>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <link rel="stylesheet" href="css/main.css">
        
    </head>
    <body>
        <?php include 'header.inc.php'; ?>
        <main class="grid-container">
            <h1>Company</h1>
            <div id="saveMsg" >
                <?php if(isset($_GET["edit"])) { ?>
                <p>The Company Data has been Updated</p>
                <?php } ?>
            </div>
            <div id="companySymbol">
                <img src="logos/<?php echo $symbol; ?>.svg" />
            </div>
            <p id="sym" value="<?php echo $symbol; ?>"><?php echo $symbol; ?></p>

            <form method="get" action="save.php">
                
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
            <!--java script for getting the single company info-->
            
    </body>
</html>