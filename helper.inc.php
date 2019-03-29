<?php

// config include for the database 
include('config.php');

// function for returning a sql query result and closing the pdo call
function sqlResult($sql){
    
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        $pdo = null;
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }
    
    return $result;
}

function userByEmailSQL($email){
    return "SELECT * FROM users WHERE email = $email";
}


function getPasswordByEmail($email){
    $result = sqlResult(userByEmailSQL($email));
    return $result;
}
    

?>