<?php session_start(); ?>
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
    <div class="container">
    <h1>Stock Browser</h1>    
        <div id="home">
            <div class="card" >
                <a id="abtInd" href="about.php"><img class="stockImg" src="./stock/adam-solomon-472458-unsplash.jpg" alt="Photo by Adam Solomon on Unsplash"></a>
                <button><a href="about.php">About Us</a></button>    
            </div>
            <div class="card">
                <a href="list.php"><img class="stockImg" src="./stock/carl-solder-532353-unsplash.jpg" alt="Photo by Carl Solder on Unsplash"></a>
                    <button><a href="list.php">Companies</a></button>
            </div>
            <?php if(!isset($_SESSION["id"])){ ?>
            <div class="card">
                <a href="login.php"><img class="stockImg" src="./stock/nhu-nguyen-785023-unsplash.jpg" alt="Photo by Nhu Nguyen on Unsplash"></a>
                
                    <button><a href="login.php">Log In</a></button>
                
            </div>
            <div class="card">
                <a href="signup.php"><img class=stockImg src="./stock/katie-moum-1191608-unsplash.jpg" alt="Photo by Katie Moum on Unsplash"></a>
                    <button><a href="signup.php">Sign Up</a></button>
            </div>
            <?php } else { ?>           
                        
            <div class="card">
                <a href="favorites.php"><img class="stockImg" src="./stock/bogomil-mihaylov-768373-unsplash.jpg" alt="Photo by Bogomil Mihaylov on Unsplash"></a>
                    <button><a href="favourites.php">Favorites</a></button>
            </div>
            <div class="card">
                <a href="portfolio.php"><img class="stockImg" src="./stock/shot-by-cerqueira-1150405-unsplash.jpg" alt="Photo by Shot by Cerqueira on Unsplash"><a>
                    <button><a href="portfolio.php">Portfolio</a></button>
            </div>
            <div class="card">
                <a href="profile.php"><img class="stockImg" src="./stock/ben-sweet-456320-unsplash.jpg" alt="Photo by Ben Sweet on Unsplash"></a>
                    <button><a href="profile.php">Profile</a></button>
            </div>
            <div class="card">
                <a href="logout.php"><img class="stockImg" src="./stock/renee-fisher-1106303-unsplash.jpg" alt="Photo by Renee Fisher on Unsplash"></a>
                    <button><a href="logout.php">Log Out</a></button>
            </div>
            
            <?php } ?>
            <a id = "profile-tile" href="">Profile</a>
            <a id ="logout-tile" href="">Logout</a></a>
            <a id ="favourites-tile" href="">Favourites</a></a>
            <a id ="portfolio-tile" href="">Portfolio</a></a>
        </div>
    </div>
</main>  
<!--<script src="js/main.js"></script>-->
<script src="js/menu2.js"></script>
</body>
</html>