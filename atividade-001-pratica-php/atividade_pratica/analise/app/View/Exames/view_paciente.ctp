<h1><?= $paciente['Paciente']['nome']; ?></h1>

<p>Código: <?= $paciente['Paciente']['id']; ?></p>
<p>Login: <?= $paciente['Paciente']['login']; ?></p>
<p>Senha: <?= $paciente['Paciente']['senha']; ?></p>

<?= $this->Html->link("Voltar", array('controller' => 'exames', 'action' => 'index')); ?>
