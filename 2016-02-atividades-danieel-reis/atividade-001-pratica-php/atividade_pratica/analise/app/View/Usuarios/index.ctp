<h1>Usuarios</h1>

<!-- <?php Debugger::dump($usuarios); ?> -->
<?= $this->Html->link("Adicionar", array('controller' => 'usuarios', 'action' => 'add')); ?>
<br><br>

<table>
  <tr>
    <th>Código</th>
    <th>Nome</th>
    <!-- <th>Login</th>
    <th>Senha</th> -->
    <th>Tipo</th>
    <th>Editar</th>
    <th>Excluir</th>
  </tr>

<?php foreach ($usuarios as $u): ?>

  <tr>
    <td>
      <?php echo $u['Usuario']['id'] ?>
    </td>

    <td>
      <?= $this->Html->link($u['Usuario']['nome_usuario'], array('controller' => 'usuarios',
       'action' => 'view', $u['Usuario']['id'])); ?>
    </td>

    <!-- <td>
      <?php echo $u['Usuario']['login'] ?>
    </td>

    <td>
      <?php echo $u['Usuario']['senha'] ?>
    </td> -->

    <td>
      <?php
        $tipo = intval($u['Usuario']['tipo']);
        if($tipo == 1) {
          echo "ADMINISTRADOR";
        } else if($tipo == 2) {
          echo "OPERADOR";
        }
      ?>
    </td>

    <td>
      <?= $this->Html->link("Editar", array('controller' => 'usuarios',
       'action' => 'edit', $u['Usuario']['id'])); ?>
    </td>

    <td>
      <?= $this->Html->link("Excluir", array('controller' => 'usuarios',
       'action' => 'delete', $u['Usuario']['id']),
       array('confirm' => 'Confirma exclusão?')); ?>
    </td>

  </tr>

<?php endforeach; ?>

</table>

<?= $this->Html->link("Voltar", array('controller' => 'pages', 'action' => 'home')); ?>
