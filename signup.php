<?php
session_start(); 
/* TODO
create user in DB
*/
include('helper.inc.php');
include('__functions.inc.php');

//i think we're already using email for login, might run into problems where the vars collide
$Fname = '';
$Lname = '';
$email = '';
$city = '';
$country = '';

$newAccount =TRUE;
    if(checkSet($_POST['FName'])){$Fname = $_POST['FName'];    }else{ $newAccount=FALSE;}
    if(checkSet($_POST['LName'])){$Lname = $_POST['LName'];    }else{ $newAccount=FALSE;}
    if(checkSet($_POST['Email'])){
        $email = $_POST['Email']; 
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script type='text/javascript'>alert('this email does not meet the format');</script>";
            $newAccount = FALSE;
        }
        else{
        $dupEmail = FALSE;
        $sqlEmails = "Select email from users";
        $result =sqlResult($sqlEmails);
        while($row = $result->fetch()){
            if($email == $row[0]){
                $dupEmail = TRUE;
                $newAccount = FALSE;
            }
        }
        if ($dupEmail = TRUE) {
            echo "<script type='text/javascript'>alert('this email is already in the database');</script>";
        }
    
    }
    }
    if(checkSet($_POST['City'])){$city = $_POST['City'];      }else{ $newAccount=FALSE;}
    if(checkSet($_POST['Country'])){$country = $_POST['Country'];   }else{ $newAccount=FALSE;}
    if(checkSet($_POST['Pword'])){$pw = $_POST['Pword'];        }else{ $newAccount=FALSE;}
    if(checkSet($_POST['ConPow'])){$conP = $_POST['ConPow'];        }else{ $newAccount=FALSE;}
    if($pw != $conP){$newAccount =FALSE;}

//create user
/*Todo
redirect to -- profile? 
change users to have an index column/make id auto index? 
*/
if($newAccount){
    $pw = password_hash($pw, PASSWORD_BCRYPT,['cost' => 12]);
    // id not required
    $userData = [
        'firstname'=>$Fname,
        'lastname'=>$Lname,
        'city'=>$city,
        'country'=>$country,
        'email'=>$email,
        'password'=>$pw
        ];
    addUser($userData);
    // echo ($newAccount);
    header('Location: login.php?newAcc='. $newAccount);
}




?>

<html>
    <head>
        <meta charset="utf-8"/>  
        <title>Sign Up</title>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">   
        <link rel="stylesheet" href="css/signup.css">
        <link rel="stylesheet" href="css/main.css">
        
        <script src="js/menu2.js"></script>
        <script src="js/signup.js"></script>
        
    </head>
    <body>
    <?php include 'header.inc.php'; ?>
    <main class="grid-container" id="signupParent">
        
        
        <form name=signup action="signup.php" method="post" id="signup-form">
            <h1 id ="formHeader">Sign up</h1>
            <label for="FName">First Name</label>
            <input class="signup" type="text" name="FName" Placeholder="First Name" pattern="\S+.*" required value="<?=$Fname?>"> 
            <label for="LName">Last Name</label>
            <input class="signup" type="text" name="LName" Placeholder="Last Name" required value="<?=$Lname?>">
            <label for="City">City</label>
            <input class="signup" type="text" name="City" Placeholder="City" required value="<?=$city?>">
            <label for="Country">Country</label>
            <input class="signup" type="text" name="Country" Placeholder="Country" required value="<?=$country?>">
            <label for="Email">Email</label>
            <input class="signup" type="text" name="Email" Placeholder="Email" required >
            <label for="Pword">Password</label>
            <input class="signup" type="password" id="Pword" name="Pword" Placeholder="Password" minlength="6" required value="<?=$pw?>">
            <label for="ConPow">Confirm Password</label>
            <input class="signup" type="password" id="ConPow" name="ConPow" Placeholder="Confirm Password" minlength="6" required value="<?=$pw?>">
            <button type="button" id="showPass">Show password</button>
            <button type="submit" id="signup" value="Submit">Sign Up</button>
            <!--validate on click-->
        </form>
    </main>
        <?php 
        if($dupeEmailF){
            echo "<script source='js/signup.js'>this.errorWindow()</script>";
        }
    ?>
    
    </body>
    

</html>