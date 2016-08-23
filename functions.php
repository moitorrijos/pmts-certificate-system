<?php 

define ( 'THEMEROOT', get_template_directory_uri() );
define ( 'IMAGESPATH', THEMEROOT . '/images' );

/**
 * Register Styles and Scripts
 */
require get_template_directory() . '/includes/register_my_styles_and_scripts.php';

/**
 * Post Types
 */
require get_template_directory() . '/post-types/certificates.php';
require get_template_directory() . '/post-types/courses.php';
require get_template_directory() . '/post-types/instructors.php';
require get_template_directory() . '/post-types/resolutions.php';
require get_template_directory() . '/post-types/quotations.php';
require get_template_directory() . '/post-types/reports.php';
require get_template_directory() . '/post-types/quotation-code-title.php';
require get_template_directory() . '/post-types/reports-code-title.php';
require get_template_directory() . '/post-types/certificates-post-title.php';
require get_template_directory() . '/post-types/admin-columns/custom-admin-columns-courses.php';
require get_template_directory() . '/post-types/includes/change-title-lable.php';

/**
 * Custom Fields
 */
require get_template_directory() . '/acf-custom-fields/certificates-fields.php';
require get_template_directory() . '/acf-custom-fields/courses-fields.php';
require get_template_directory() . '/acf-custom-fields/quotations-fields.php';
require get_template_directory() . '/acf-custom-fields/resolutions-fields.php';
require get_template_directory() . '/acf-custom-fields/reports-fields.php';
require get_template_directory() . '/acf-custom-fields/instructors-fields.php';


/**
 * Custom Taxonomies
 */
require get_template_directory() . '/custom-tax/office-taxonomy.php';
require get_template_directory() . '/custom-tax/country-taxonomy.php';

/**
 * Other Includes
 */
require get_template_directory() . '/includes/ajax-login.php';
require get_template_directory() . '/includes/search_form_remove_admin_bar.php';
require get_template_directory() . '/includes/add_html5_support.php';
require get_template_directory() . '/includes/register-nav-menus.php';
require get_template_directory() . '/includes/acf-total-certificate-number.php';
require get_template_directory() . '/includes/acf-save-post-data.php';
require get_template_directory() . '/includes/acf-remove-post-data.php';
require get_template_directory() . '/includes/add-local-remote-button-admin-bar.php';
require get_template_directory() . '/includes/search-by-id-passport.php';
require get_template_directory() . '/includes/search-certificates.php';
require get_template_directory() . '/includes/search-quotations.php';
require get_template_directory() . '/includes/fill-form-randomly.php';
require get_template_directory() . '/includes/fill-deck-courses.php';
require get_template_directory() . '/includes/my_courses_post_object_results.php';
require get_template_directory() . '/includes/add_leading_zeroes.php';
require get_template_directory() . '/includes/certificate-exists-validation.php';

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}

