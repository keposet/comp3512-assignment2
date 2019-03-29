<?php 
    foreach($_POST as $name => $val ){
        echo "name $name";
        echo "value $val";
        
    }
    // lol :) 
    //plaintext
    $password = "mypassword";
    //mypassword048d741e931f907110adf460816ff958
    $userPWHash = password_hash($password, PASSWORD_BCRYPT,['cost' => 12, 'salt' => '048d741e931f907110adf460816ff958']);
    //value from db
    $hash = '$2a$12$F.jpatdVlOnrYWLi/lxPNO90T0auUpFnDP5JTb3aTx7z1QSu5nX42';
    $hash = '$2a$12$o9lzPmLOFgpODyhYHUOXO.wojqkQph.fBZKO8k83hromrC0bC4TFi';
    /*
    +------------------------------------+--------------------------------------------------------------+----------------------------------+
| email                              | password                                                     | salt                             |
+------------------------------------+--------------------------------------------------------------+----------------------------------+
| hemmens0@de.vu                     | $2a$12$F.jpatdVlOnrYWLi/lxPNO90T0auUpFnDP5JTb3aTx7z1QSu5nX42 | 048d741e931f907110adf460816ff958 |
| gcrannage1@mit.edu                 | $2a$12$o9lzPmLOFgpODyhYHUOXO.wojqkQph.fBZKO8k83hromrC0bC4TFi | 9bce2f838034b8c8d2ba1220daef2e7e |
    */
    //im staring at the phpmyadmin and it sure is missing the part i highlighted

    if(password_verify($password, $hash)){
        echo "success";
    }else {
        echo "fail";
    };

?>