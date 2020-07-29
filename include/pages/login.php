<?php 

    if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) {
        header('Location: '.$path);
        exit;
    }

    if(isset($_POST['btn-login'])) {

        $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

        if($user !== "" && $pass !== "") {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$_POST['username']]);
            $user = $stmt->fetch();
          
            if(md5($pass) === $user['password']){
                session_start();

                $_SESSION['loggedUserName'] = $user['username'];
                $_SESSION['loggedUserId'] = $user['id'];
                $_SESSION['loggedUserRole'] = $user['role'];

                header('Location: '.$path);
                exit;
            }
        }
    }
?>
<div class="content login">
    <h1 class="article-title">LOGIN</h1>
    <div class="container reg">
        <div class="article">
            <form action="" method="POST">
                <label><input type="text" name="username" placeholder="Username" /></label>
                <label><input type="password" name="pass" placeholder="Password" /></label>
                <label><input type="submit" name="btn-login" value="Login" /></label>
            </form> 
            <p>
                <a href="<?php echo $path; ?>/registration">Not registered?</a>
            </p>
        </div>
    </div>      
</div>