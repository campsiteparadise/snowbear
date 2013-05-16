<section class="admin-form">
<p class="info warning ui-state-highlight"><?=$role->name?> has  <?=count($role_permissions['assigned'])?> permissions.</p>
<form name="role_permission" id="role_permission" method="post" action="<?=base_url()?>rolepermission/save">
	<input type="hidden" name="role_id" value="<?=$role->id?>" id="role_id" />
<table class="admin-list">
		<tr>
			<th class="id">ID</th>
			<th>Name</th>
			<th>Assigned</th>
		</tr>
		<?foreach($role_permissions['list'] as $permission):?>
			<tr>
				<td class="id"><?=$permission['id']?></td>
				<td><?=$permission['name']?></td>
				<td>
					<?if(isset($role_permissions['assigned'][$permission['id']])):?>
						<input type="checkbox" name="permission_id[]" value="<?=$permission['id']?>" checked="checked" />
					<?else:?>
						<input type="checkbox" name="permission_id[]" value="<?=$permission['id']?>" />
					<?endif;?>
				</td>
			</tr>
		<?endforeach?>
</table>
	<button type="submit" class="save">Save</button>
</form>
</section>
