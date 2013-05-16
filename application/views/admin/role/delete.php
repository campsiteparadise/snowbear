<section class="admin-form">
	<form name="delete_role" method="post" action="<?=base_url()?>role/delete/<?=$role->id?>">
		<fieldset>
			<legend>Delete Role</legend>
			<ul>
				<li>Really delete role <strong><?=$role->name?></strong></li>
				<li>
					<button type="submit" name="confirmed">Yes</button>
					<a class="button" href="<?=base_url()?>role/">No</a>
				</li>
			</ul>
		</fieldset>
	</form>
</section>
