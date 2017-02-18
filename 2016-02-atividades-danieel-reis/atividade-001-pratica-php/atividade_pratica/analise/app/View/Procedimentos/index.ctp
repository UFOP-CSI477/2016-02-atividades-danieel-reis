<h1>Procedimentos</h1>

<!-- <?php Debugger::dump($procedimentos); ?> -->
<?= $this->Html->link("Adicionar", array('controller' => 'procedimentos', 'action' => 'add')); ?>
<br><br>

<table>
  <tr>
    <th>Código</th>
    <th>Nome</th>
    <!-- <th>Preço</th> -->
    <th>Editar</th>
    <th>Excluir</th>
  </tr>

<?php foreach ($procedimentos as $p): ?>

  <tr>
    <td>
      <?php echo $p['Procedimento']['id'] ?>
    </td>

    <td>
      <?= $this->Html->link($p['Procedimento']['nome'], array('controller' => 'procedimentos',
       'action' => 'view', $p['Procedimento']['id']));?>
    </td>

    <!-- <td>
      <?php echo $p['Procedimento']['preco'] ?>
    </td> -->

    <td>
      <?= $this->Html->link("Editar", array('controller' => 'procedimentos',
       'action' => 'edit', $p['Procedimento']['id'])); ?>
    </td>

    <td>
      <?= $this->Html->link("Excluir", array('controller' => 'procedimentos',
       'action' => 'delete', $p['Procedimento']['id']),
       array('confirm' => 'Confirma exclusão?')); ?>
    </td>

  </tr>

<?php endforeach; ?>

</table>

<?= $this->Html->link("Voltar", array('controller' => 'pages', 'action' => 'home')); ?>
