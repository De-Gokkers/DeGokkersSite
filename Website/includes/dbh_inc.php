<?php


try{
    $db=new PDO("mysql:host=localhost;dbname=loginsystem","root","");


} catch(PDOException $e){
    ("Oops, something went wrong :(");
    $e->getMessage();
    die();
}



