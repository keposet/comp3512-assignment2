<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Home</title>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
    <link rel="stylesheet" href="css/main.css">
        
    <!--<link rel="stylesheet" href="css/lab12-test01.css">-->
</head>
<body>
<?php include 'header.inc.php'; ?>
<main class="grid-container">
    <div class="tile">
    <h1>Stock Browser</h1>    
        <div id="home">
            <div class="card">
                <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="about">
                <div id="cardContent">
                    <button><a href="about.php">About</a></button>
                </div>
            </div>
            <div class="card">
                <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="about">
                <div class="cardContent">
                    <button><a href="list.php">Companies</a></button>
                </div>
            </div>
            <?php if(!isset($_SESSION["id"])){ ?>
            <div class="card">
                <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="about">
                <div class="cardContent">
                    <button><a href="login.php">Log In</a></button>
                </div>
            </div>
            <div class="card">
                <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="about">
                <div class="cardContent">
                    <button><a href="signup.php">Sign Up</a></button>
                </div>
            </div>
            <?php } else { ?>           
                        
            <div class="card">
                <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="about">
                <div class="cardContent">
                    <button><a href="favourites.php">Favourites</a></button>
                </div>
            </div>
            <div class="card">
                <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="about">
                <div class="cardContent">
                    <button><a href="portfolio.php">Portfolio</a></button>
                </div>
            </div>
            <div class="card">
                <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="about">
                <div class="cardContent">
                    <button><a href="profile.php">Profile</a></button>
                </div>
            </div>
            <div class="card">
                <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="about">
                <div class="cardContent">
                    <button><a href="logout.php">Log Out</a></button>
                </div>
            </div>
            
            <?php } ?>
            
            <!--<a href="list.php">Companies</a>-->
            <!--<a href="login.php">Log In</a>-->
            <!--<a href="signup.php">Sign Up</a>-->
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