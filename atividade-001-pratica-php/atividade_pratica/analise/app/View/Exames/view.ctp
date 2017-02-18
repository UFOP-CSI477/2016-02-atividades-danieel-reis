<h1><?= $this->Html->link($paciente['Paciente']['nome'], array('controller' => 'pacientes',
    'action' => 'view', $exame['Exame']['paciente_id'])); ?></h1>

<p>Código: <?= $exame['Exame']['id']; ?></p>
<p>Procedimento: <?= $this->Html->link($procedimento['Procedimento']['nome'],
  array('controller' => 'procedimentos', 'action' => 'view', $exame['Exame']['procedimento_id'])); ?></p>
<p>Data: <?= $exame['Exame']['data']; ?></p>

<?= $this->Html->link("Voltar", array('controller' => 'exames', 'action' => 'index')); ?>
