<section class="admin-form">
<p class="info warning ui-state-highlight"><?=$user->username?> has  <?=count($user_roles)?> roles.</p>
<form name="user_role" id="user_role" method="post" action="<?=base_url()?>user/saveroles">
	<input type="hidden" name="user_id" value="<?=$user->id?>" id="user_id" />
<table class="admin-list">
		<tr>
			<th class="id">ID</th>
			<th>Name</th>
			<th>Assigned</th>
		</tr>
		<?foreach($roles as $role):?>
			<tr>
				<td class="id"><?=$role->id?></td>
				<td><?=$role->name?></td>
				<td>
					<?if(isset($user_roles[$role->id])):?>
						<input type="checkbox" name="role_id[]" value="<?=$role->id?>" checked="checked" />
					<?else:?>
						<input type="checkbox" name="role_id[]" value="<?=$role->id?>" />
					<?endif;?>
				</td>
			</tr>
		<?endforeach;?>
</table>
	<button type="submit" class="save">Save</button>
</form>
</section>
