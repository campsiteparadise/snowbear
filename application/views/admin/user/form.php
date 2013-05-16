<section class="admin-form">
	<h2 class="section-title">Add user</h2>
	<form name="add_user" class="vertical" method="post" action="<?=base_url()?>user/save">
		<fieldset>
			<input type="hidden" name="id" id="id" value="<?=(isset($user->id))?$user->id:''?>" />
			<ul>
				<li>
					<label for="firstname">First name</label>
					<input type="text" class="required" name="firstname" id="firstname" value="<?=(isset($user->firstname)) ? $user->firstname:''?>" />
				</li>
				<li>
					<label for="lastname">Last name</label>
					<input type="text" class="required" name="lastname" id="lastname" value="<?=(isset($user->lastname)) ? $user->lastname:''?>" />
				</li>
				<li>
					<label for="username">User name</label>
					<input type="text" class="required" name="username" id="username" value="<?=(isset($user->username)) ? $user->username:''?>" />
				</li>
				<li>
					<label for="password">Password</label>
					<input type="password" class="required" name="password" id="password" value="" />
				</li>
				<li>
					<label for="repeat_password">Repeat Password</label>
					<input type="password" class="required" name="repeat_password" id="repeat_password" value="" />
				</li>
				<li">
					<button class="save">Save User</button>
				</li>
			</ul>
		</fieldset>
	</form>
</section>
