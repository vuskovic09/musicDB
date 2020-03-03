<?php

global  $uriParts, $page_load;
// get page
$requestUri = $_SERVER['REQUEST_URI'];
$page = str_ireplace('/musicDB/', '', $requestUri);
$uriParts = explode('/', $page);



if ($page == "") {

	$page_load = "home";

} else {

	if (count($uriParts) == 1) {

		if ($uriParts[0] == "login") {

			$page_load = "login";

		} else if ($uriParts[0] == "logout") {

			$page_load = "logout";

		} else if ($uriParts[0] == "registration") {

			$page_load = "registration";

		} else if ($uriParts[0] == "bands") {

			$page_load = "bands";
			
		} else if ($uriParts[0] == "albums") {

			$page_load = "albums";
			
		} else if ($uriParts[0] == "songs") {

			$page_load = "songs";
			
		} else {

			header('Location: '.$path);
            exit;

		}

	}

	if (count($uriParts) == 2) {

		if ($uriParts[0] == "band") {

			$page_load = "albums";

		} else if ($uriParts[0] == "user") {

			$page_load = "profile";

		} else {

            header('Location: '.$path);
            exit;

		}
	}

	if (count($uriParts) == 3) {

		if ($uriParts[0] == "band") {

			$page_load = "albums";

		} else if ($uriParts[0] == "user") {

			$page_load = "playlist";

		} else {

            header('Location: '.$path);
            exit;
		}

	}

	if (count($uriParts) == 4) {

		if($uriParts[0] == "band") {

			$page_load = "songs";

		} else {

			header('Location: '.$path);
            exit;

		}
	}

}
