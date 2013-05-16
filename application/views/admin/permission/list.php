<?
$this->load->view('admin/permission/add');

if($permissions===false):?>
	<p class="info warning ui-state-highlight">There are no permissions defined in the system.</p>
<?else:?>
	<p class="info message ui-state-highlight">There are <?=count($permissions)?> <strong>permissions</strong> defined in the system</p>
	<table class="admin-list">
		<tr>
			<th class="id">ID</th>
			<th>Name</th>
			<th class="options" colspan="2">Options</th>
		</tr>
	<?foreach($permissions as $permission):?>
		<tr>
			<td class="id"><?=$permission->id?></td>
			<td><?=$permission->name?></td>
			<td class="options">
				<a class="edit button" href="<?=base_url()?>permission/edit/<?=$permission->id;?>">Edit</a>
			</td>
			<td>
				<a class="delete button" href="<?=base_url()?>role/delete/<?=$permission->id;?>">Delete</a>
			</td>
		</tr>
	<?endforeach;?>
	</table>
<?endif;

$this->load->view('admin/permission/add');
?>
