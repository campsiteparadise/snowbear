<table>
<tr>
	<?foreach($field_data as $field):?>
		<th class="<?=$field->name?>"><?=humanize($field->name)?></th>
	<?endforeach;?>
	<?$command_count = (isset($list_commands['add']) && $list_commands['add']) ? count($list_commands)-1 : count($list_commands);?>
	<th class="options" colspan="<?=$command_count?>">Options</th>
</tr>
<?foreach($list as $item):?>
	<tr>
		<?foreach($item as $key=>$value):?>
			<td><?=$value?></td>
		<?endforeach;?>
		
		<?foreach($list_commands as $command=>$active):?>
			<?if($active && $command!='add'):?>
				<td>
					<a class="<?=$command?>" href="<?=base_url()?><?=$model?>/<?=$command?>/<?=$item['id']?>"><?=$command?></a>
				</td>
			<?endif;?>
		<?endforeach;?>
	</tr>
<?endforeach;?>
</table>
