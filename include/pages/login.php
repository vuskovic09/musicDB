<div class="register">
    <h1>REGISTER</h1>
    <!-- ERRORS ON REGISTRATION.PHP -->
    <?php 
        if(isset($_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){
                echo $error . "</br>";
            }
            unset($_SESSION['errors']);
        }

        if(isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    
    ?>
    <form action="logic/registration.php" method="POST" onSubmit="return check();">
        <input type="text" name="username" placeholder="Username" />
        <input type="text" name="email" placeholder="E-Mail" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="confirm-pass" placeholder="Confirm Password" />
        <input type="submit" name="btn-register" value="Register" />
    </form> 

    <script>
        function check(){
            let eMail = document.querySelector("input[name='email']").value;
            let regexEmail = /^\w+[.\d\w]*\@[a-z]{2,10}(\.[a-z]{2,3})+$/;
            if(!eMail.match(regexEmail)){
                alert("Email not OK!");
                return false;
            }
        }
</div>


<div class="login">
    <h1>LOGIN</h1>
    <form action="logic/logging.php" method="POST">
        <input type="text" name="email" placeholder="E-Mail" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="submit" name="btn-login" value="Login" />
    </form>   
</div>