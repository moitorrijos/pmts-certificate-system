<?php

function unsetsession(){

	if (isset($_GET['action']) && $_GET['action'] == 'clear_session'){

		unset($_SESSION['students_name']);

		unset($_SESSION['passport_id']);

		unset($_SESSION['place_of_birth']);

		unset($_SESSION['date_of_birth']);

	}
}

add_action('template_redirect', 'unsetsession');