<?php

    $navQuery = "SELECT * FROM `navigation`";
    $execNav = $pdo->query($navQuery);
    $dataNav = $execNav -> fetchAll();

?>

<header class="header">
    <div class="container">
        <div class="header-logo">
            <p><a href="<?php echo $path;?>/home">MetalDB</a></p>
        </div>

        <ul>
        <?php foreach($dataNav as $rowNav){ ?>
            <li><a href="<?php echo $path . $rowNav['href']?>"><?php echo $rowNav['name']?></a></li>
        <?php   } ?>
        </ul>

        <?php 
        if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) { ?>
            <a href="<?php echo $path; ?>/profile"><?php print_r($_SESSION['loggedUserName']); ?></a>
            <?php if($_SESSION['loggedUserRole'] == 0){?> 
            <a href="<?php echo $path; ?>/adminPanel">Admin Panel</a>
            <?php }; ?>
            <a href="<?php echo $path; ?>/logout">LOGOUT</a>
        <?php
        } else { ?>
            <ul>
                <li><a href="<?php echo $path; ?>/login">Login</a></li>
                <li><a href="<?php echo $path; ?>/registration">Register</a></li>
            </ul> 
        <?php } ?>
    </div>
</header>
