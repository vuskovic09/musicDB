<?php 

    if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) {
        header('Location: '.$path);
        exit;
    }

    if(isset($_POST['btn-login'])) {

        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

        if($username !== "" && $pass !== "") {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$_POST['username']]);
            $user = $stmt->fetch();
          
            if(md5($pass) === $user['password']){
                session_start();

                $_SESSION['loggedUserName'] = $username;
                $_SESSION['loggedUserId'] = $user['id'];
                $_SESSION['loggedUserRole'] = $user['role'];

                header('Location: '.$path);
                exit;
            }
        }
    }
?>
<div class="login">
    <h1>LOGIN</h1>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="submit" name="btn-login" value="Login" />
    </form> 
    <p>
        <a href="<?php echo $path; ?>/registration">
         Not registered?
        </a>
    </p>

    <!-- validation -->
      
</div>