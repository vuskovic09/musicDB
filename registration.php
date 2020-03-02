<?php
    session_start();

    if(isset($_POST['btn-register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $confirm_pass = $_POST['confirm-pass'];

        //regex variables

        $errors = [];

        //regex ifs

        if(count($errors) == 0) {
            require "connection.php";

            $query = "INSERT INTO users VALUES(NULL, :username, :email, :password, :active, :created)";
            $prepare = $pdo -> prepare($query);
            $prepare -> bindParamm(":username", $username);
            $prepare -> bindParamm(":email", $email);

            $pass = md5($pass);
            $prepare -> bindParam(":password", $pass);

            $date = date("Y-m-d H:i:s");
            $prepare -> bindParam(":created", $date);

            $isActive = 0;
            $prepare -> bindParam(":active", $isActive);

            try {
                $execute = $prepare -> execute();

                $_SESSION['success'] = "Successful Registration!";

                header("Location: ../include/partials/header.php")
            } catch(PDOException $ex) {
                //error
            }
        }
    }

?>