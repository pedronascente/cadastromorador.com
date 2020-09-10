<div>
	<div>
		<h1>Tokens únicos com CodeIgniter</h1>
	</div>
	<p><a href="<?=base_url('generate-token')?>" title="Clique aqui para gerar um token único">Clique aqui</a> para gerar um token único.</p>
	<?php if($tokens): ?>
	<h3>Outros tokens gerados</h3>
	<ul>
		<?php foreach($tokens as $tk): ?>
		<li><?=$tk->token?></li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>