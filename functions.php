<?php 

define ( 'THEMEROOT', get_template_directory_uri() );
define ( 'IMAGESPATH', THEMEROOT . '/images' );

require get_template_directory() . '/includes/register_my_styles_and_scripts.php';
require get_template_directory() . '/includes/ajax-login.php';
require get_template_directory() . '/post-types/certificates.php';
require get_template_directory() . '/post-types/courses.php';
require get_template_directory() . '/post-types/instructors.php';
require get_template_directory() . '/post-types/resolutions.php';
require get_template_directory() . '/post-types/quotations.php';
require get_template_directory() . '/post-types/quotation-code-title.php';
require get_template_directory() . '/post-types/certificates-post-title.php';
require get_template_directory() . '/post-types/admin-columns/custom-admin-columns-courses.php';
require get_template_directory() . '/post-types/includes/change-title-lable.php';
require get_template_directory() . '/post-types/custom-fields/acf-code.php';
require get_template_directory() . '/custom-tax/office-taxonomy.php';
require get_template_directory() . '/custom-tax/country-taxonomy.php';
require get_template_directory() . '/includes/search_form_remove_admin_bar.php';
require get_template_directory() . '/includes/add_html5_support.php';
require get_template_directory() . '/includes/register-nav-menus.php';
require get_template_directory() . '/includes/acf-total-certificate-number.php';
require get_template_directory() . '/includes/acf-save-post-data.php';
require get_template_directory() . '/includes/acf-remove-post-data.php';
require get_template_directory() . '/includes/add-local-remote-button-admin-bar.php';
require get_template_directory() . '/includes/search-by-id-passport.php';
require get_template_directory() . '/includes/search-certificates.php';
require get_template_directory() . '/meta-boxes/pmtscs-register-meta-boxes.php';
