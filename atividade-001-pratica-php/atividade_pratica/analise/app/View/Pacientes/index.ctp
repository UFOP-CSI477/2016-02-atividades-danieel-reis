<h1>Pacientes</h1>

<!-- <?php Debugger::dump($pacientes); ?> -->

 <?= $this->Html->link("Adicionar", array('controller' => 'pacientes', 'action' => 'add')); ?>
<br><br>

<table>
  <tr>
    <th>Código</th>
    <th>Nome</th>
<!--    <th>Login</th>
    <th>Senha</th> -->
    <th>Editar</th>
    <th>Excluir</th>
  </tr>

<?php foreach ($pacientes as $p): ?>

  <tr>
    <td>
      <?php echo $p['Paciente']['id'] ?>
    </td>

    <td>
      <?= $this->Html->link($p['Paciente']['nome'], array('controller' => 'pacientes',
       'action' => 'view', $p['Paciente']['id'])); ?>
    </td>

    <!-- <td>
      <?php echo $p['Paciente']['login'] ?>
    </td>

    <td>
      <?php echo $p['Paciente']['senha'] ?>
    </td> -->

    <td>
      <?= $this->Html->link("Editar", array('controller' => 'pacientes',
       'action' => 'edit', $p['Paciente']['id'])); ?>
    </td>

    <td>
      <?= $this->Html->link("Excluir", array('controller' => 'pacientes',
       'action' => 'delete', $p['Paciente']['id']),
       array('confirm' => 'Confirma exclusão?')); ?>
    </td>

  </tr>

<?php endforeach; ?>

</table>

<?= $this->Html->link("Voltar", array('controller' => 'pages', 'action' => 'home')); ?>
