<div class="main check">

	<div class="main-content">

        <?php 
        
            if( have_posts() ) : while( have_posts() ) : the_post();

            the_title('<h1>', '</h1>');

            endwhile; endif; wp_reset_query();

            if( isset($_GET['certificateId']) ) {

                $certificateId = $_GET['certificateId'];

            } else {

                $certificateId = -1;
            }

            $certificate = get_post( (int)$certificateId );
            if  ( $certificate ) :

				$student_name = get_field('students_name', $certificateId);
				$course = get_field('course', $certificateId);
				$passport_id = get_field('passport_id', $certificateId);
				$date_of_birth = get_field('date_of_birth', $certificateId);
				$date_of_issuance = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance', $certificateId) );
				$participants_nationality = get_field( 'student_nationality', $certificateId );
            $pmtscs_register_code = get_post_meta( $certificateId, 'pmtscs_register_code', true );

        ?>
        
            <ul class="authentic-certificate">
				<li class="authentic">
					<svg version="1.1" id="checkmark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 98.5 98.5" enable-background="new 0 0 98.5 98.5" xml:space="preserve">
						<path class="checkmark" fill="none" stroke-width="8" stroke-miterlimit="10" d="M81.7,17.8C73.5,9.3,62,4,49.2,4
						C24.3,4,4,24.3,4,49.2s20.3,45.2,45.2,45.2s45.2-20.3,45.2-45.2c0-8.6-2.4-16.6-6.5-23.4l0,0L45.6,68.2L24.7,47.3"/>
					</svg>
                    <span>Authentic Certificate</span>
                </li>
                <li>
                    <small>Participant's Name:</small>
                    <?php echo $student_name; ?>
                </li>
					 <li>
					 	<small>Course Name</small>
						<?php echo get_the_title($course->ID); ?>
					 </li>
                <li>
                    <small>Participant's Passport/ID:</small>
                    <?php echo $passport_id; ?>
                </li>
				<li>
					<small>Participant's Date of Birth:</small>
					<?php echo $date_of_birth; ?>
				</li>
				<li>
					<small>Participant's Nationality:</small>
					<?php echo $participants_nationality; ?>
				</li>
                <li>
                    <small>Register Code:</small>
                    <?php echo $pmtscs_register_code; ?>
                </li>    
                <li>
                    <small>Certificate Date of Issuance:</small>
                    <?php echo $date_of_issuance->format('d F Y'); ?>
                </li>
            </ul>

        <?php else : ?>

            <h3>Certificate not valid</h3>

        <?php endif; ?>

	</div>

</div>