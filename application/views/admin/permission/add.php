<section class="admin-form">
	<h2 class="section-title"><?=(isset($role)) ? 'Edit':'Add'?> Permission</h2>
	<form name="add_permission" method="post" action="<?=base_url()?>permission/<?=(isset($permission)) ? 'edit/'.$permission->id : 'add'?>">
		<?if(isset($permission)):?>
			<input rel="Permission name" type="hidden" name="id" value="<?=$permission->id?>" />
		<?endif;?>
		<fieldset>
			<ul>
				<li>
					<label for="permission_name">Permission</label>
					<input rel="Permission name" type="text" class="required" name="permission_name" id="permission_name" value="<?=(isset($permission)) ? $permission->name:''?>" />
				</li>
				<li class="command">
					<button type="submit" value="submit" >Save</button>
				</li>
			</ul>
		</fieldset>
	</form>
</section>
