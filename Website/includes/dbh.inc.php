<?php


try{
    $conn=new PDO("mysql:host=localhost;dbname=gokkers","root","");


} catch(PDOException $e){
    ("Oops, something went wrong :(");
    $e->getMessage();
    die();
}
