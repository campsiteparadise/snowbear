<section class="admin-form">
	<h2 class="section-title"><?=(isset($role)) ? 'Edit':'Add'?> Role</h2>
	<form name="add_role" method="post" action="<?=base_url()?>role/<?=(isset($role)) ? 'edit/'.$role->id : 'add'?>">
		<?if(isset($role)):?>
			<input rel="Role name" type="hidden" name="id" value="<?=$role->id?>" />
		<?endif;?>
		<fieldset>
			<ul>
				<li>
					<label for="role_name">Role</label>
					<input rel="Role name" type="text" class="required" name="role_name" id="role_name" value="<?=(isset($role)) ? $role->name:''?>" />
				</li>
				<li class="command">
					<button class="save" type="submit" value="submit" >Save</button>
				</li>
			</ul>
		</fieldset>
	</form>
</section>
