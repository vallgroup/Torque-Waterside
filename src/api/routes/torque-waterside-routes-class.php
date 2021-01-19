<?php

require_once( get_template_directory() . '/api/permissions/torque-api-permissions-class.php');
require_once( Torque_Waterside_API_ROOT . 'controllers/torque-waterside-controller-class.php');

class Torque_Waterside_Routes {

  public static $resource = '/email';

  private $namespace;

  public function __construct( $namespace ) {
    $this->namespace = $namespace;
  }

  public function register_routes() {

    register_rest_route( $this->namespace, self::$resource , array(
	  	array(
	  		'methods'             => 'GET',
	  		'callback'            => array( $this, 'send_email' ),
	  		'args'                => Torque_Waterside_Controller::email_args(),
	  		// 'permission_callback' => array('Torque_API_Permissions', 'user_can_read'),
	  	),
	  ) );
  }

  public function send_email( $request ) {
    $controller = new Torque_Waterside_Controller( $request );
    return $controller->send_email();
  }
}

?>
