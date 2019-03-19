<?php 
include('../helper.inc.php');

// if else for query string, sets result for comapnay data
if(isset($_GET['sym'])){
    $sym = $_GET['sym'];
    $result = sqlResult('Select * from companies Where symbol ='.'"' .$sym.'"');
    // $result = sqlResult('Select * from companies Where symbol = A');
}
else{
    $result = sqlResult("Select * from companies");
}
    
$row = $result->fetchAll(); 
header('Content-Type: application/json');
echo json_encode($row, JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT+JSON_UNESCAPED_SLASHES );

?>
