<?php 
if(isset($_POST['btn-msg'])){

    $msgName = $_POST['name'];
    $msgText = $_POST['message'];
    
    $query = "INSERT INTO `messages` (`id`, `username`, `message`) VALUES (NULL, :username, :message)";
            
    $prepare = $pdo->prepare($query);
    $prepare->bindParam(":username", $msgName);
    $prepare->bindParam(":message", $msgText);

    try {
        $execute = $prepare->execute();
    } catch(PDOException $ex) {
        $_SESSION['errors'] = ['Something went wrong.'];
    }
}


?>

<footer class="footer-distributed">

    <div class="footer-left">

        <p class="footer-links">
            <a href="#">Home</a>
            ·
            <a href="#">Blog</a>
            ·
            <a href="#">Pricing</a>
            ·
            <a href="#">About</a>
            ·
            <a href="#">Faq</a>
            ·
            <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">Company Name © 2015</p>

        <div class="footer-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
        </div>

    </div>

    <div class="footer-right">

<?php if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) { ?>
    <p>Contact the administrators</p>   
    <form action="" method="POST" onSubmit="return check()">
        <label><input type="text" name="name" placeholder="Your Name"></label>
        <label><textarea name="message" placeholder="Message"></textarea></label>
        <label><input type="submit" name="btn-msg" value="Send Message" /></label>
    </form>
<?php } ?>
    </div>

</footer>
