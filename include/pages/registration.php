<?php
    if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) {
        header('Location: '.$path);
        exit;
    }

?>

<?php if(count($errors) > 0) { ?>
<div class="errors">

</div>
<?php ?>

<div class="register">
    <h1>REGISTER</h1>
    <form action="logic/register.php" method="POST" onSubmit="return check();">
        <input type="text" name="username" placeholder="Username" />
        <input type="text" name="email" placeholder="E-Mail" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="confirm-pass" placeholder="Confirm Password" />
        <input type="submit" name="btn-register" value="Register" />
    </form> 

    <script>
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
    </script>
</div>