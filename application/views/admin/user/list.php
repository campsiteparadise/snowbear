<?$this->load->view('admin/user/add');?>
<p class="info warning ui-state-highlight">There are currently <?=$user_count?> users.</p>
<?if($user_count):?>
	<table class="admin-list">
		<tr>
			<th class="id">id</th>
			<th>Name</th>
			<th>User name</th>
			<th class="options" colspan="3">Options</th>
		</tr>
		<?foreach($users as $user):?>
			<tr>
				<td><?=$user->id?></td>
				<td><?=$user->firstname?> <?=$user->lastname?></td>
				<td><?=$user->username?></td>
				<td class="options">
					<a class="button edit" href="<?=base_url()?>user/edit/<?=$user->id?>">Edit</a>
				</td>
				<td class="options">
					<a class="button role" href="<?=base_url()?>user/roles/<?=$user->id?>">Edit Roles</a>
				</td>
				<td class="options">
					<a class="button delete" href="<?=base_url()?>user/delete/<?=$user->id?>">delete</a>
				</td>
			</tr>
		<?endforeach;?>
	</table>
<?endif?>
<?$this->load->view('admin/user/add');?>
