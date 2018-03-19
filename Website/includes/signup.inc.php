<?php

if (isset($_POST['submit'])){
    require ('dbh.inc.php');

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $pdoQry_users = 'INSERT INTO users(user_email, user_pwd) VALUES (:email, :password)';

    $pdoResult = $db->prepare($pdoQry_users);

    $pdoExec = $pdoResult->execute(array(":email"=> $email, ":password"=> $pass));

    if ($pdoExec){
        header('location: ../index.php?message=Logged in!!');
    }else{
        echo 'Error, failed to insert data.';
    }
}
