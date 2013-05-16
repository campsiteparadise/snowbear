<section class="admin-form">
	<form name="delete_permission" method="post" action="<?=base_url()?>permission/delete/<?=$permission->id?>">
		<fieldset>
			<legend>Delete Permission</legend>
			<ul>
				<li>Really delete permission <strong><?=$permission->name?></strong></li>
				<li>
					<button type="submit" name="confirmed">Yes</button>
					<a class="button" href="<?=base_url()?>permission/">No</a>
				</li>
			</ul>
		</fieldset>
	</form>
</section>
