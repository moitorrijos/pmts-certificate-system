<?php

function unsetsession(){

	if (isset($_GET['action']) && $_GET['action'] == 'clear_session'){

		unset($_SESSION['students_name']);

		unset($_SESSION['passport_id']);

		unset($_SESSION['place_of_birth']);

		unset($_SESSION['student_nationality']);

		unset($_SESSION['date_of_birth']);

		unset($_SESSION['office']);

		unset($_SESSION['instructor']);

		unset($_SESSION['course']);

		unset($_SESSION['start_date']);

		unset($_SESSION['end_date']);

		unset($_SESSION['date_of_issuance']);

	}
}

add_action('template_redirect', 'unsetsession');