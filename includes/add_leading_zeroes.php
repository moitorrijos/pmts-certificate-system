<?php

function add_leading_zeroes ( $the_code ) {

	if ( $the_code > 9999 ) {

		$leading_zero = '';

	} elseif ( $the_code > 999 && $the_code <= 9999 ) {

		$leading_zero = '0';

	} elseif ( $the_code > 99 && $the_code <= 999 ) {

		$leading_zero = '00';

	} elseif ( $the_code > 9 && $the_code <= 99 ) {

		$leading_zero = '000';

	} else {

		$leading_zero = '0000';
	}

	return $leading_zero;
	
}