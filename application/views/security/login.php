<form action="<?=base_url()?>login/authorise" method="post">
	<fieldset>
		<legend>Log in</legend>
		<ul>
			<li>
				<label for="username">User name or Email</label>
				<input type="text" name="username" id="username" value="<?=(isset($input->username)) ? $input->username : ''?>" />
			</li>
			<li>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" value="<?=(isset($input->password)) ? $input->password : ''?>" />
			</li>
			<li class="command">
				<button type="submit" name="login" id="login" value="1">Log In</button>
			</li>
		</ul>
	</fieldset>
</form>
