<?php

require_once( get_template_directory() . '/api/responses/torque-api-responses-class.php');
require_once( get_template_directory() . '/includes/validation/torque-validation-class.php');

class Torque_Waterside_Controller {

	public static function email_args() {
		return array(
      'name' => array(
        'validate_callback' => array( 'Torque_Validation', 'string' ),
      ),
			'email' => array(
        'validate_callback' => array( 'Torque_Validation', 'string' ),
      ),
    );
	}

	protected $request = null;

	function __construct( $request ) {

		$this->request = $request;
	}

	public function send_email() {
		try {

			$to = $this->request['email'];
			$subject = 'Waterside Eastlake';
			$headers[] = 'Content-Type: text/html; charset=UTF-8';
			$headers[] = 'Bcc: '.get_field('bcc_email', 'options');
			$headers[] = 'From: Waterside Eastlake <info@watersideeastlake.com>';
			$body  = '<html>';
			$body .= '<p>Hi '.$this->request['name'].',</p>';
			$body .= '<p>Thank you for your interest in <b>Waterside Eastlake</b> and for requesting our comprehensive Floor Plan Guide.</p>';
			$body .= '<p>Please find below the downloadable PDF containing all 20 floor plans spanning our four Collections – Lakeshore, Weatherly, Leeward and Midway.</p>';
			$body .= '<p><a href="https://watersideeastlake.com/wp-content/uploads/2020/11/Waterside-AllFloorplans-20201109-compressed.pdf?utm_source=floorplans_email&utm_medium=email&utm_campaign=download_all_floorplans">https://watersideeastlake.com/wp-content/uploads/2020/11/Waterside-AllFloorplans-20201109-compressed.pdf</a></p>';
			$body .= '<p>We are currently in the first of three phases of construction. Phase 1 completion date is scheduled for Spring ‘21 and Phase 2 will be completed in Winter ‘21.  Prices at Waterside start at 975K.</p>';
			$body .= '<p><b>ON-SITE VISIT</b><br />
			We are offering private guided tours of Waterside, by appointment only. To register for a Hard Hat Tour, please contact me directly or sign up at:  https://intro.watersideeastlake.com/tours/.</p>';
			$body .= '<p>Please let us know if we can answer any questions regarding these properties.</p>';
			$body .= '<p>Thanks again for your interest, and we look forward to hearing from you.</p>';
			$body .= '<p>Kind regards,</p>';
			$body .= '<p>Melissa McMurray, Broker<br />
			Derek Wade, Broker</p>';
			$body .= '<p>Waterside Eastlake<br />
			206.792.4200<br />
			<a href="mailto:info@watersideeastlake.com">info@watersideeastlake.com</a><br />
			<a href="watersideeastlake.com">watersideeastlake.com</a></p>';
			$body .= '<p style="font-size: 90%;">Located within Seattle’s highly sought-after neighborhood of Eastlake, Waterside provides the perfect blend of chic sophistication and dynamic energy. This modern townhome community will offer 27 luxury, four-level residences available for purchase. Residents will have a diverse selection of more than 20 floor plan options and two distinctive interior finish packages, Copenhagen (white oak) and Whidbey (walnut). Situated in the heart of one of Seattle\'s most iconic neighborhoods, Waterside Eastlake blends modern sophistication, character, lakefront access, community and convenience.</p>';
			$body .= '<p><img src="http://watersideeastlake.com/wp-content/uploads/2021/01/waterside-white.png" width="200" /></p>';
			$body .= '</html>';

			if ( wp_mail( $to, $subject, $body, $headers ) ) {
        return Torque_API_Responses::Success_Response( array(
          'email_sent'	=> true
        ) );
			}

			return Torque_API_Responses::Failure_Response( array(
				'email_sent'	=> false
			));

		} catch (Exception $e) {
			return Torque_API_Responses::Error_Response( $e );
		}
	}
}
