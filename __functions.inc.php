<?php 
session_start(); 
function checkSet($uData){
    $scriptVar = false;
    if(isset($uData) && sizeof($uData) > 0){
        $scriptVar = true;
    return $scriptVar;
}}

function wipeFav(){
    unset($_SESSION['fav']);
}
?>