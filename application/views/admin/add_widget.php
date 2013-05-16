<section class="admin-form">
	<h2 class="section-title">Add <?=$model?></h2>
	<form name="add_<?=$model?>" method="post" action="<?=base_url()?><?=$model?>/edit">
				<fieldset>
			<ul>
				<li class="command">
					<button class="save" type="submit" value="submit" >Add</button>
				</li>
			</ul>
		</fieldset>
	</form>
</section>
