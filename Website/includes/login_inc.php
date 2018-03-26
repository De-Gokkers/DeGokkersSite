<?php

session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "loginsystem";


$conn  = new PDO("mysql:host=localhost;dbname=loginsystem", $username, $password);
$sql = "Select * FROM users";
$query = $conn->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

