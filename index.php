<?php

ob_start();
session_start();

require('include/config.php');
require('include/services/connection.php');
require('include/services/router.php');
require('include/partials/favorites.php');


?><!DOCTYPE html>
<html lang="en-us">

	<head>

		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1, width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<base href="<?php echo $path ?> /" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	</head>

	<body>

		<!-- page wrap -->
		<div class="page-wrapper">

		    <?php require_once('include/partials/header.php'); ?>
			
			<main class="main">
				<?php require('include/pages/'. $page_load . '.php'); ?>
			</main>

		    <?php require_once('include/partials/footer.php'); ?>

	    </div>
		<!-- /page wrap -->

		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="assets/js/script.js"></script>

	</body>

</html>