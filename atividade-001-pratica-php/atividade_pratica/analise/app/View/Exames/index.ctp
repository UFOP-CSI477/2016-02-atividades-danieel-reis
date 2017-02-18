<h1>Exames</h1>

<!-- <?php Debugger::dump($exames); ?> -->
<?= $this->Html->link("Adicionar", array('controller' => 'exames', 'action' => 'add')); ?>
<br><br>

<table>
  <tr>
    <th>Código</th>
    <th>Paciente</th>
    <th>Procedimento</th>
    <th>Data</th>
    <th>Editar</th>
    <th>Excluir</th>
  </tr>

<?php foreach ($exames as $e): ?>

  <tr>
    <td>
      <?php echo $e['Exame']['id'] ?>
    </td>

    <td>
      <?= $this->Html->link($e['Exame']['paciente_id'], array('controller' => 'exames',
       'action' => 'view_paciente', $e['Exame']['paciente_id'])); ?>
    </td>

    <td>
      <?= $this->Html->link($e['Exame']['procedimento_id'], array('controller' => 'exames',
       'action' => 'view_procedimento', $e['Exame']['procedimento_id']));?>
    </td>

    <!-- <td>
       <?= $this->Html->link($e['Procedimento']['nome'],
         array('controller' => 'procedimentos', 'action' => 'view', $e['Exame']['procedimento_id'])); ?>
    </td> -->

    <td>
      <?php echo $e['Exame']['data'] ?>
    </td>

    <td>
      <?= $this->Html->link("Editar", array('controller' => 'exames',
       'action' => 'edit', $e['Exame']['id'])); ?>
    </td>

    <td>
      <?= $this->Html->link("Excluir", array('controller' => 'exames',
       'action' => 'delete', $e['Exame']['id']),
       array('confirm' => 'Confirma exclusão?')); ?>
    </td>

  </tr>

<?php endforeach; ?>

</table>

<?= $this->Html->link("Voltar", array('controller' => 'pages', 'action' => 'home')); ?>
