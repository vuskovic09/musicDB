<?php
session_start();


if(isset($_POST['btn-register'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmPass = $_POST['confirm-pass'];

    $regexName = "/^[A-Z][a-z]{2,19}$/";
    $regexPass = "/^.{4,50}$/";

    $errors = [];

    if(!preg_match($regexName, $name)){
        $errors[] = "Name not ok";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Email not ok";
    }

    if(!preg_match($regexPass, $pass)){
        $errors[] = "Password not ok";
    }

    if($pass != $confirmPass){
        $errors[] = "Passwords do not match";
    }

    var_dump($errors);

    if(count($errors) == 0) {
        require "../include/services/connection.php";
        $query = "INSERT INTO users VALUES (NULL, :username, :email, :password, :active, :created)";
        
        $prepare = $pdo->prepare($query);
        $prepare->bindParam(":username", $name);
        $prepare->bindParam(":email", $email);

        $pass = md5($pass);
        $prepare->bindParam(":password", $pass);

        $active = 0;
        $prepare->bindParam(":active", $active);

        $date = date("Y-m-d H:i:s");
        $prepare->bindParam(":created", $date);

        try {
            $execute = $prepare->execute();
            $_SESSION['success'] = "Successful registration!";

        } catch(PDOException $ex) {            
            $_SESSION['errors'] = ["Email already registered."];
        }
        

    } else {
        $_SESSION['errors'] = $errors;
    }
}