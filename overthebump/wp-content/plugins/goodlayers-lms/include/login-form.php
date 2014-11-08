<?php
	/*	
	*	Goodlayers Login Form File
	*/	
	
	// redirect to login page
	add_filter('home_template', 'gdlr_lms_register_login_template');
	add_filter('page_template', 'gdlr_lms_register_login_template');
	add_filter('paged_template', 'gdlr_lms_register_login_template');
	function gdlr_lms_register_login_template($template){
		if( !is_user_logged_in() ){
			if( !empty($_GET['login']) ){
				$template = dirname(dirname( __FILE__ )) . '/login.php';
			}else if( !empty($_GET['register']) ){
				$template = dirname(dirname( __FILE__ )) . '/register.php';
			}
		}
		return $template;
	}
	
	add_action('wp_login_failed', 'gdlr_lms_login_redirect');
	function gdlr_lms_login_redirect( $username = '' ){
		global $pagenow;
		if( 'wp-login.php' == $pagenow ){
			$args = array('login'=>home_url());
			if(!empty($username)){ $args['failed'] = 1;}
			wp_redirect(add_query_arg($args, home_url()));
			exit();
		}
	}	
	
	
?>