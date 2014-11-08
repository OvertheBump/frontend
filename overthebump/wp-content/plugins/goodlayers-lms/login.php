<?php get_header(); ?>
<div id="primary" class="content-area">
<div id="content" class="site-content" role="main">
<?php
	if( function_exists('gdlr_lms_get_header') && !empty($gdlr_lms_option['show-header']) && $gdlr_lms_option['show-header'] == 'enable' ){
		gdlr_lms_get_header();
	}
?>
	<div class="gdlr-lms-content">
		<div class="gdlr-lms-container gdlr-lms-container">
			<div class="gdlr-lms-item">
				<?php if(!empty($_GET['failed'])){ ?>
					<div class="gdlr-lms-error">
					<?php _e('The login credentials is incorrect. Please try again.', 'gdlr-lms'); ?>
					</div>
				<?php } ?>
				<form class="gdlr-lms-form" method="post" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>">
					<p class="gdlr-lms-half-left">
						<label><?php _e('Username', 'gdlr-lms'); ?></label>
						<input type="text" name="log" />
					</p>
					<p class="gdlr-lms-half-right">
						 <label><?php _e('Password', 'gdlr-lms'); ?></label>
						 <input type="password" name="pwd" />
					</p>
					<div class="clear"></div>
					<p>
						<input type="hidden" name="rememberme"  value="forever" />
						<input type="hidden" name="redirect_to" value="<?php echo $_GET['login'] ?>" />
						<input type="submit" class="gdlr-lms-button" value="<?php _e('Sign In!', 'gdlr-lms'); ?>" />
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php 
get_sidebar( 'content' );
get_sidebar(); 

get_footer(); ?>