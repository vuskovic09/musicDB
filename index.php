<?php

ob_start();
session_start();

require('include/config.php');
require('include/services/connection.php');
require('include/services/router.php');


?><!DOCTYPE html>
<html lang="en-us">

	<head>

		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1, width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<link rel="stylesheet" type="text/css" href="include/css/style.css" />
	</head>

	<body>

		<!-- page wrap -->
		<div class="page-wrapper">

		    <?php require_once('include/partials/header.php'); ?>

			<header>
				<?php
					if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) { ?>
					<a href="<?php echo $path; ?>/logout">LOGOUT</a>
					<?php
					}
					?>

			</header>

			<main class="main">
				<?php require('include/pages/'. $page_load . '.php'); ?>
			</main>

		    <?php require_once('include/partials/footer.php'); ?>

	    </div>
		<!-- /page wrap -->

	</body>

</html><?php $pdo = null; ?>
