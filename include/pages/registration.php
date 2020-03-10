<?php
    if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) {
        
        header('Location: '.$path);
        exit;

    } else if(isset($_POST['btn-register'])){

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
        } else if(count($errors) > 0) { 
            foreach($errors as $error) {?>
            <div class="errors">
                <?php echo($error); ?>
            </div>
        <?php
            }
        } else {
            $_SESSION['errors'] = $errors;
        }
    }
?>

<div class="register">
    <h1>REGISTER</h1>
    <form action="" method="POST" onSubmit="return check();">
        <input type="text" name="username" placeholder="Username" />
        <input type="text" name="email" placeholder="E-Mail" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="confirm-pass" placeholder="Confirm Password" />
        <input type="submit" name="btn-register" value="Register" />
    </form> 
</div>

<!-- <script>
    function check(){
        let name = document.querySelector("input[name='username']").value;
        let regex = /^[A-Z][a-z]{2,19}$/;

        if(!regex.test(name)) {
        alert("Name invalid");
        return false;
        }

        let email = document.querySelector("input[name='email']").value;
        let regexEmail = /^\w+[.\d\w]*\@[a-z]{2,10}(\.[a-z]{2,3})+$/;

        if(!email.match(regexEmail)) {
        alert("Email not ok!");
        return false;
        }

        let regexPass = /^.{4,50}$/; 

        let pass = document.querySelector("input[name='pass']").value;

        if(!pass.match(regexPass)) {
        alert("Pass not ok!");
        return false;
        }

        let confirmPass = document.querySelector("input[name='confirm-pass']").value;


        if(pass != confirmPass) {
        alert("Passwords don't match!");
        return false;
        }

        return true;
    }
</script> -->