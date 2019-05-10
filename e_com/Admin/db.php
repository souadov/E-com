<?php 
$localName = 'localhost';
$dbname = 'e_comm';
$user = 'root';
$pwd = '';
try{
    $db = new PDO('mysql:host='.$localName.';dbname='.$dbname,$user,$pwd);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}catch(Exception $e){
    echo('Impossible de conneceter à la base de donnee ');
    echo($e->getMessage());
    die;
}