<?php

add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );

function ajax_login(){

    if ( !check_ajax_referer( 'pmtscs_login', 'security' ) ) {

        return wp_send_json_error('Invalid security threshold, please try again later.');

    }

    $info = array(
        'user_login' => $_REQUEST['username'],
        'user_password' => $_REQUEST['password'],
        'remember'  => true,
    );

    $user_signon = wp_signon( $info, false );

    if ( !is_wp_error( $user_signon ) ) {
        echo json_encode(array(
            'loggedin' => true,
            'message' => 'Login succesfull, redirecting...'
        ));
    } else {
        echo json_encode(array(
            'loggedin' => false,
            'message' => 'Incorrect username or Password. Please try again or contact administrator.',
        ));
    }

    wp_die();

}