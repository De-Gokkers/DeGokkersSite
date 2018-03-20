<?php


if (isset($_POST['submit'])){

    include 'dbh_inc.php';

    $u_name = $_POST['username'];
    $u_email = $_POST['email'];
    $u_pwd = $_POST['password'];
    $hash = password_hash($u_pwd, PASSWORD_DEFAULT);
    $query = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $query->bindValue(1, $u_email);
    $query->execute();


    //error handlers
    //check for empty fields
    if (empty($u_email) || empty($u_name) || empty($u_pwd)){
        header("location: ../index.php?signup=empty");
        exit();
    }else{
        //check if input characters are valid
        if (preg_match("/^[a-zA-Z]*$/", $u_email)){
            header("location: ../index.php?signup=invalid");

            exit();
        }else{
            //check if email is valid
            if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)){
                header("location: ../index.php?signup=email");
                exit();
            }else{


                if ( $u_email > 0){
                    header("location: ../index.php?signup=email taken");
                    exit();
                }else{
                    //hashing the password
                    $hashedPwd = password_hash($u_pwd, PASSWORD_DEFAULT);
                    //insert the user into the database
                    $pdoQry_users = 'INSERT INTO gokkers(u_name, u_email, u_pwd) VALUES (:username, :email, :password)';
                    $pdoResult = $conn->prepare($pdoQry_users);
                    $pdoExec = $pdoResult->execute(array(":email" => $u_email,":username" => $u_name,  ":password" => $hashedPwd));
                    header("location: ../index.php?signup=success");

                }
            }
        }
    }
} else {
    header("location: ../index.php");
    exit();
}









