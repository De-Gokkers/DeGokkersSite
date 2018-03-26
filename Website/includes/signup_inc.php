<?php

if (isset($_POST['submit'])) {
    require('dbh_inc.php');

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $username = $_POST['username'];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $query = $db->prepare("SELECT email FROM users WHERE email = ?");
    $query->bindValue(1, $email);
    $query->execute();

    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo ('1');

        if (!empty($pass)){


              if (!empty($username)){


                  if (!empty($email)){

                      $pdoQry_users = 'INSERT INTO users(user_email, user_pwd, username) VALUES (:email, :password, :username)';
                      $pdoResult = $db->prepare($pdoQry_users);
                      $pdoExec = $pdoResult->execute(array(":email" => $email,":username" => $username,  ":password" => $hash));
                      header('location: ../index.php?message=Registered!!');

                  }

              }else{
                  ('Fields empty');
              }

        } else{
            echo ('Fields empty');
        }
    }
}











    /*if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (!$query->rowCount() > 0){
            ($passwordlenght = strlen($_POST['password'])
            // change the 1 back to 7 when done testing
            if ($passwordlenght > 7)

            $pdoQry_users = 'INSERT INTO users(user_email, user_pwd, username) VALUES (:email, :password, :username)';
            $pdoResult = $db->prepare($pdoQry_users);
            $pdoExec = $pdoResult->execute(array(":email" => $email,":username" => $username,  ":password" => $hash));
            header('location: ../index.php?message=Registered!!');
        }else{
            echo 'Error, email already in use';
        }
    }
}else{
    echo 'Error, failed to insert data.';
    die();
}
    */










