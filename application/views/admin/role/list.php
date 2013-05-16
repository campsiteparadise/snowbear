<?
$this->load->view('admin/role/add');

if($roles===false):?>
	<p class="info warning ui-state-highlight">There are no roles defined in the system.</p>
<?else:?>
	<p class="info message ui-state-highlight">There are <?=count($roles)?> <strong>roles</strong> defined in the system</p>
	<table class="admin-list">
		<tr>
			<th class="id">ID</th>
			<th>Name</th>
			<th class="options" colspan="3">Options</th>
		</tr>
	<?foreach($roles as $role):?>
		<tr>
			<td class="id"><?=$role->id?></td>
			<td><?=$role->name?></td>
			<td class="options">
				<a class="edit button" href="<?=base_url()?>role/edit/<?=$role->id;?>">Edit</a>
			</td>
			<td class="options">
				<a class="permission button" href="<?=base_url()?>rolepermission/assigned/<?=$role->id;?>">Permissions</a>
			</td>
			<td class="options">
				<a class="delete button" href="<?=base_url()?>role/delete/<?=$role->id;?>">Delete</a>
			</td>
		</tr>
	<?endforeach;?>
	</table>
<?endif;

$this->load->view('admin/role/add');
?>
