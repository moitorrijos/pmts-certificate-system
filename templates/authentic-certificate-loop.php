<div class="main">

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
            $passport_id = get_field('passport_id', $certificateId);
            $date_of_issuance = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance', $certificateId) );
            $pmtscs_register_code = get_post_meta( $certificateId, 'pmtscs_register_code', true );

        ?>
        
            <ul class="authentic-certificate">
                <li>
                    <i class="fa fa-check"></i>
                    Authentic Certificate
                </li>
                <li>
                    <small>Participant's Name:</small>
                    <?php echo $student_name; ?>
                </li>
                <li>
                    <small>Participant's Passport/ID:</small>
                    <?php echo $passport_id; ?>
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