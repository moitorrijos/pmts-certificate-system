<?php  

function add_localstorage_to_form( $args ) {

	echo '
	<script>
		if (typeof jQuery == "undefined") {
			console.log("jQuery is not loaded");
		} else {
			console.log("jQuery is loaded");
		}
	</script>
	';

}

add_action( 'acf/input/form_data', 'add_localstorage_to_form', 10, 1 );