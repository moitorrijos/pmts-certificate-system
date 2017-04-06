<?php

function startsession() { 
	
	if (!session_id()){

		session_start();
    
	}
  
}

add_action( 'init', 'startsession', 1);