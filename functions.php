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
require get_template_directory() . '/post-types/invoices.php';
require get_template_directory() . '/post-types/application-forms.php';
require get_template_directory() . '/post-types/reports.php';
require get_template_directory() . '/post-types/quotation-code-title.php';
require get_template_directory() . '/post-types/reports-code-title.php';
require get_template_directory() . '/post-types/application-form-code-title.php';
require get_template_directory() . '/post-types/certificates-post-title.php';
require get_template_directory() . '/post-types/admin-columns/custom-admin-columns-courses.php';
require get_template_directory() . '/post-types/includes/change-title-lable.php';

/**
 * Custom Fields
 */
require get_template_directory() . '/acf-custom-fields/certificates-fields.php';
require get_template_directory() . '/acf-custom-fields/courses-fields.php';
require get_template_directory() . '/acf-custom-fields/quotations-fields.php';
require get_template_directory() . '/acf-custom-fields/invoices-fields.php';
require get_template_directory() . '/acf-custom-fields/application-forms-fields.php';
require get_template_directory() . '/acf-custom-fields/resolutions-fields.php';
require get_template_directory() . '/acf-custom-fields/reports-fields.php';
require get_template_directory() . '/acf-custom-fields/instructors-fields.php';

/**
 * Custom Taxonomies
 */
require get_template_directory() . '/custom-tax/office-taxonomy.php';
require get_template_directory() . '/custom-tax/country-taxonomy.php';

/**
 * WP Specific Includes
 */
require get_template_directory() . '/includes/search_form_remove_admin_bar.php';
require get_template_directory() . '/includes/add_html5_support.php';
require get_template_directory() . '/includes/register-nav-menus.php';
require get_template_directory() . '/includes/add-local-remote-button-admin-bar.php';
require get_template_directory() . '/includes/custom-pagination.php';
require get_template_directory() . '/includes/ajax-login.php';

/**
 * Custom Functions
 */
require get_template_directory() . '/includes/acf-total-certificate-number.php';
require get_template_directory() . '/includes/acf-save-post-data.php';
require get_template_directory() . '/includes/acf-remove-post-data.php';
require get_template_directory() . '/includes/search-by-id-passport.php';
require get_template_directory() . '/includes/search-certificates.php';
require get_template_directory() . '/includes/search-quotations.php';
require get_template_directory() . '/includes/fill-form-randomly.php';
require get_template_directory() . '/includes/fill-deck-courses.php';
require get_template_directory() . '/includes/my_courses_post_object_results.php';
require get_template_directory() . '/includes/add_leading_zeroes.php';
require get_template_directory() . '/includes/certificate-exists-validation.php';
// require get_template_directory() . '/includes/create-new-invoice.php';
require get_template_directory() . '/includes/create-table-with.php';
require get_template_directory() . '/includes/get_participant_number.php';

/**
 * Includes for application
 */
require get_template_directory() . '/includes/pmtscs_header_for_print.php';
require get_template_directory() . '/includes/student_info_complete_table.php';
require get_template_directory() . '/includes/student_info_short_table.php';

function practical_exam_results( $course_obj ){

	?>

	<div class="required-documents">
		<ul>
			<li>
				El Examen es tomado presencialmente e individualmente./The Exam must be taken in classroom and individually.
			</li>
			<li>
				El participante tiene hasta 120 minutos para terminar esta prueba. Después de 120 minutos el evaluador puede darle 10 minutos extra. La prueba debe realizarse sin ayuda./The participant has up to 55 minutes to finish this test. After 120 minutes the Assessor can give you 10 extra minutes Test must be carried out without assistance.
			</li>
			<li>
				Se debe obtener mas de 70% de las respuestas correctas para pasar./Must obtain more than 70% of the answers correctly to pass.
			</li>
		</ul>
	</div>

	<div class="exam-answers">
		<h3 class="short-short">Resultados de Examen Práctico/ <small>Practical Exam Results</small></h3>
	</div>

	<table class="practical-eval">
		<thead>
			<tr>
				<th class="description">
					Descripción/ Description
				</th>
				<th>
					Yes<br>&#10003;
				</th>
				<th>
					No<br>X
				</th>
				<th class="description">
					Observaciones/ Remarks
				</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$questions_count = get_post_meta( $course_obj->ID, 'observation_test', true );
				for ($i=0; $i<$questions_count; $i++) :
					
			?>
				<tr>
					<td><?php echo get_post_meta($course_obj->ID, 'observation_test_' . $i . '_practical_exam_question', true); ?></td>
					<td></td><td></td><td></td>
				</tr>
			<?php endfor; ?>
		</tbody>
	</table>

	<?php
}

/**
 * Todo:
 * Save the course price to the database by updating the course
 * price field, only if the course price field is not set.
 */