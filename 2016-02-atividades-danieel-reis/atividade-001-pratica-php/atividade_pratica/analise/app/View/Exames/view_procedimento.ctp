<h1><?= $procedimento['Procedimento']['nome']; ?></h1>

<p>Código: <?= $procedimento['Procedimento']['id']; ?></p>
<p>Preço: <?= $procedimento['Procedimento']['preco']; ?></p>
<p>Usuário: <?= $this->Html->link($procedimento['Procedimento']['usuario_id'], array('controller' => 'usuarios',
    'action' => 'view', $procedimento['Procedimento']['usuario_id'])); ?></p>

<?= $this->Html->link("Voltar", array('controller' => 'procedimentos', 'action' => 'index')); ?>
