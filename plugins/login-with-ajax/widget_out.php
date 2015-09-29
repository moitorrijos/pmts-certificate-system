<div class="login-form">
	<span class="lwa-status"></span>
	<form class="lwa-form" action="<?php echo esc_attr(LoginWithAjax::$url_login); ?>">

		<label><?php esc_html_e( 'Username','login-with-ajax' ); ?></label>
		<input type="text" name="log" id="lwa_user_login" class="input" />


		<label><?php esc_html_e( 'Password','login-with-ajax' ); ?></label>
		<input type="password" name="pwd" id="lwa_user_pass" class="input" />


		<div class="lwa-login_form">
			<?php do_action('login_form'); ?>
		</div>
		
		<div class="lwa-submit-button rememberme">
			<label><input name="rememberme" type="checkbox" class="lwa-rememberme" value="forever" /> <?php esc_html_e( 'Remember Me','login-with-ajax' ) ?></label>

			<input type="submit" name="wp-submit" id="lwa_wp-submit" value="<?php esc_attr_e('Log In','login-with-ajax'); ?>" />
			<input type="hidden" name="login-with-ajax" value="login" />
			<?php if( !empty($lwa_data['redirect']) ): ?>
			<input type="hidden" name="redirect_to" value="<?php echo esc_url($lwa_data['redirect']); ?>" />
			<?php endif; ?>
		</div>

	</form>
</div>