<header class="header">
    <div class="container">
        <div class="header-logo">
            </p>LOGO TEXT</p>
        </div>

        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Bands</a></li>
            <li><a href="#">Albums</a></li>
            <li><a href="#">Songs</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Author</a></li>
        </ul>

        <?php 
        if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) { ?>
            <a href="<?php echo $path; ?>/logout">LOGOUT</a>
        <?php
        }   
    ?>
    </div>
</header>
