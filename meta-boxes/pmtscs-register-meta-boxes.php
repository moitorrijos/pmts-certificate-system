<?php

/**
 * Register meta box(es).
 */
function pmtscs_register_meta_boxes() {
    add_meta_box( 'pmtscs_register_code', __( 'Register Code', 'certificate_system' ), 'pmtscs_register_code_markup', 'certificates', 'side', 'default', null );
}
add_action( 'add_meta_boxes', 'pmtscs_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function pmtscs_register_code_markup( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
    wp_nonce_field( basename(__FILE__), "pmtscs_register_code_nonce" );

    ?>

		<div>
			<p><?php echo get_post_meta( $post->ID, "pmtscs_register_code", true ); ?></p>
		</div>
		
    <?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function register_code_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
    if (!isset($_POST["pmtscs_register_code_nonce"]) || !wp_verify_nonce($_POST["pmtscs_register_code_nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "certificates";
    
    if($slug != $post->post_type)
        return $post_id;

    $register_code = get_post_meta($post_id, "register_code", true);
    $course = get_post_meta($post_id, "course", true);
    $course_abbr = get_post_meta($course, "abbr", true);
    $office_id = get_post_meta( $post_id, "office", true );
    $office_obj = get_term( (int)$office_id, 'office' );
    $office_num = $office_obj->slug;
    $issue_date = get_post_meta($post_id, "date_of_issuance", true);
    $issue_datetime = DateTime::createFromFormat('Ymd', $issue_date);
    $issue_year = $issue_datetime->format('y');

    $pmtscs_register_code_value = 'PMTS/' . $course_abbr . '/' . $issue_year . '-' . $office_num . '-' . add_leading_zeroes($register_code);;

    if(isset($_POST["pmtscs_register_code"]))
    {
        $pmtscs_register_code_value = $_POST["pmtscs_register_code"];
    }   
    update_post_meta($post_id, "pmtscs_register_code", $pmtscs_register_code_value);
}
add_action( 'save_post', 'register_code_save_meta_box' );