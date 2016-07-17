<?php

function add_all_instructors(){

	$inst_list = array(
	'VICTOR THOMPSON' 		=> '01D-VITH',
	'GIOVANNY FERLINI' 		=> '01D-GIFE',
	'KYCK HYDES' 			=> '01D-RYHY',
	'EDWIN AYE  TUT' 		=> '01D-EDAY',
	'JONNATHAN BARREIRO' 	=> '01D-JOBA',
	'ANDRES VASQUEZ' 		=> '01D-ANVA',
	'ROBERTO FORGAS' 		=> '01D-ROFO',
	'CARLOS MOLINA' 		=> '02D-CAMO',
	'LUIS PARIONA' 			=> '02E-LUPA',
	'EL MASRY ADEL' 		=> '03E-ADEL',
	'DIMITRIS SPANOS' 		=> '03E-DISP',
	'JIHAD GHAMRAOUI' 		=> '03D-JICH',
	'NIKOLAOS GIAMAKIDIS' 	=> '03E-NIGI',
	'KARAVIAS GEORGIOS' 	=> '05D-KAGE',
	'RAPITIS GEORGIOS' 		=> '05E-RAGE',
	'DUANE SOUTHE' 			=> '10D-DUSO',
	'MEDHAT ABDELMEGEED' 	=> '11E-MEAB',
	'AMINE EL RAYES' 		=> '15E-AMIR',
	'TREVOR JOSIAH' 		=> '16E-TREJO',
	'PIETRO FERRARA' 		=> '17D-PIFE',
	'GIOGA LUCA' 			=> '17D-GILU',
	'ARIADNA AGUILAR' 		=> '18E-ARAG',
	'GINA DOS SANTOS' 		=> '18D-GIDO',
	'AHMED SAMIR' 			=> '19D-AHSA',
	'KALIGOTLA APPARAO' 	=> '01D-KAAP',
	'KOKA RAMARAO' 			=> '01D-KORA',
	);
	$index = 0;

	if (isset($_GET['action']) && $_GET['action'] == 'add_instructors'){

		foreach ($inst_list as $inst_name => $inst_code) {
			wp_insert_post( 
				array(
					'post_title' 	=> ucwords(strtolower($inst_name)),
					'post_type'		=> 'instructors',
					'post_status'   => 'publish', 
					'post_author'   => 1,
					'post_date'		=> '2015-01-01 00:00:' . $index,
				), true
			);
			$index++;
		}

	}

}

add_action('template_redirect', 'add_all_instructors');