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

    //VALIDATION
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

    //INSERT
    if(count($errors) == 0) {
        $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `active`, `created`) VALUES (NULL, :username, :email, :password, '', current_timestamp())";
        
        $prepare = $pdo->prepare($query);
        $prepare->bindParam(":username", $name);
        $prepare->bindParam(":email", $email);

        $pass = md5($pass);
        $prepare->bindParam(":password", $pass);

        try {
            $execute = $prepare->execute();
            $_SESSION['success'] = "Successful registration!";
            header('Location: '.$path);
            exit;
        } catch(PDOException $ex) {            
            $_SESSION['errors'] = ["Email already registered."];
            var_dump($_SESSION['errors']);
        }
        

    } else {
        $_SESSION['errors'] = $errors;
    }
}