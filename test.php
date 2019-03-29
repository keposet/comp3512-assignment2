<?php 
include('helper.inc.php');

$sql = "select email from users where id = :id";
$sql = "select id from users";
$sql = "select id from users order by id desc";
// $result = sqlBindResult($sql, array('id'=>5));
$result = sqlBindResult($sql, []);
// fetch vs fetchall don't work. this it's in the db side
// $c=0;
// while ($rec = $result->fetch()){
//     echo $c;
//     $c++;
// }
// $rec = $result->fetchAll();
// echo $rec;
// echo sizeof($rec[0]);

$result = $result->fetch();
echo $result[0];
$foo = [
    'a' => 1
    ];
array_push($foo, ['b' => 2]);
$foo['b'] =2;
echo $foo['b'];

?>