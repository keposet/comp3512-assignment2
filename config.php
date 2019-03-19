<?php 
include '/var/www/demo.php';
define('DBHOST', '');
define('DBNAME', 'companies');
define('DBUSER', getenv('user'));
define('DBPASS', getenv('cred'));
//define('DBUSERSTRING','mysql:dbname=users;charset=utf8mb4;');
define('DBCONNSTRING','mysql:dbname=important;charset=utf8mb4;');
//define('DBCOSTRING','mysql:dbname=companies;charset=utf8mb4;');
//define('DBPORTFSTRING','mysql:dbname=portfolio;charset=utf8mb4;');
?>