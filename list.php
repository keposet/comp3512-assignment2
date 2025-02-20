<html>
    <head>
    <meta charset="utf-8"/>  
    <title>Companies</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
        
    <!--<link rel="stylesheet" href="css/lab12-test01.css">-->
    </head>
    <body>
        <?php include 'header.inc.php'; ?>
        <main class="grid-container">
            <div class="container">
            <div id="loadParent" >
                <img src="https://arkenea.com/blog/wp-content/uploads/2016/04/Ajax-loader.gif"></img>
            </div>
            <div id ="listParent" style="display:none">
            <h1>Companies</h1>
            <div id="search">
                <!--the search bar-->
                <p>Filter: <input id="compFilter" type="text">  <button type="button">GO</button></p>
            </div>
            
            <div id="companyListing">
                <ul id="companyList"></ul>
            </div>
            </div>
        </main>
        </div>
        <script src="js/main.js"></script>
        <script src="js/menu2.js"></script>
    </body>
</html>