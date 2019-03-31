<?php
/**TODO 
 * creates. 
 *      portfolio
 *      
 * query extraction
 * 
*/



// config include for the database 
include('config.php');

/**Injection Safe SQL queries
 * use any time queries containing user-entered-data are used.
 * @param string $sql the query to run
 * @param array $params associative array of values to bind, must be in format
    [":id" => $id]
 * if $params is not supplied, query runs without binding. 
*/
function sqlBindResult($sql, $params=array()){
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare($sql);
        
        if(sizeof($params) > 0){
            //foreach($params as $bind => $data){echo "$bind => $data";}
            foreach($params as $bind => $data){
                
            $stmt->bindValue($bind,$data);
            }
            
            $stmt->execute();
            //$stmt->debugDumpParams();
        }else {
            $stmt->execute();
        }
        
        $pdo = null;
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }
    return $stmt;
}

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



/**
 * User Functions
*/
function userByEmailSQL($email){
    return "SELECT * FROM users WHERE email = $email";
}


function getPasswordByEmail($email){
    $result = sqlResult(userByEmailSQL($email));
    return $result;
}

function getLastId(){
    $lastID = "select id from users order by id desc";
    $count = sqlResult($lastID);
    $count = $count->fetch();
    $count = $count[0];
    $count++;
    echo $count;
    return $count;
}

function addUser($userData=array()){
    // take array of user values, populate stem, combine, bind, run. 
    // get the last id. 
   $count = getLastId();
   $userData['id'] =$count;
    $sql = "INSERT INTO `users`(`id`, `firstname`, `lastname`, `city`, `country`, `email`, `password`, `salt`, `password_sha256`) VALUES (:id,:firstname,:lastname,:city,:country,:email,:password,' ',' ')";
    sqlBindResult($sql, $userData);
}    
/*End User Functions*/

function getCompany($sym){
    $sql = '';
    
}

?>