<section class="admin-form">
	<h2 class="section-title">Edit <?=$model_name?></h2>
	<form action="<?=base_url()?><?=$model?>/save" method="post" id="<?=$model?>-edit" class="<?=$model?>-edit admin-form vertical">
		<fieldset>
		<ul>
			<?foreach($form['control'] as $input):?>
				<?=$input?>
			<?endforeach;?>
		</ul>
		</fieldset>
	</form>
</section>
