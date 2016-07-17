<div class="login-form">
	<div class="status-message"></div>
	<div class="login-loading-animation"></div>
	<form class="cs-login-form" action="login">

		<label>Username</label>
		<input type="text" name="pmtscs_user_login" id="pmtscs_user_login" class="input" />

		<label>Password</label>
		<input type="password" name="pmtscs_user_pass" id="pmtscs_user_pass" class="input" />

		<div class="pmtscs-submit-button rememberme">
			<label><input name="pmts_rememberme" id="pmts_rememberme" type="checkbox" checked="checked" class="pmtscs-rememberme" value="forever" />Remember Me</label>

			<input type="submit" name="wp-submit" id="pmtscs_wp-submit" value="Log In" />
			<input type="hidden" name="login-with-ajax" value="login" />
		</div>

	</form>
</div>