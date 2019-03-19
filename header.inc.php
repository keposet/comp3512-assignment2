<?php session_start(); ?>

<header>
    <div id="dropdown" >
        <h1 id="logo" ><i class="fas fa-chart-line"></i> logo</h1>
        <div id="dropdown-content">
            <a id="menuBars" ><i class="fas fa-bars"></i></a>
            <div class="navLinks">
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="about.php"><i class="fas fa-question-circle"></i> About</a></li>
                <li><a href="list.php"><i class="fas fa-th-list"></i> Companies</a></li>
                
                <!--php if for the log in and out, the user will only see one or the other based on session-->
                <?php if(!isset($_SESSION["id"])){?>
                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li><a href="signup.php"><i class="fas fa-user-plus"></i> Sign Up</a></li>
                <?php }else{ ?>
                <li><a href="portfolio.php"><i class="fas fa-passport"></i> Portfolio</a></li>
                <li><a href="profile.php"><i class="fas fa-user-circle"></i> Profile</a></li>
                <li><a href="favorites.php"><i class="fas fa-heart"></i> Favorites</a></li>
                <li><a href="logout.php"><i id="logOutSym" class="fas fa-sign-in-alt"></i> Log Out</a></li>
                <?php } ?>
                
            </div>
        </div>
    </div>
</header>
