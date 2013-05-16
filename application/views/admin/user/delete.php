<section class="admin-form">
	<form name="delete_role" method="post" action="<?=base_url()?>user/delete/<?=$user->id?>">
		<fieldset>
			<legend>Delete User</legend>
			<ul>
				<li>Really delete user <strong><?=$user->username?></strong></li>
				<li>
					<button type="submit" name="confirmed">Yes</button>
					<a class="button" href="<?=base_url()?>user/">No</a>
				</li>
			</ul>
		</fieldset>
	</form>
</section>
