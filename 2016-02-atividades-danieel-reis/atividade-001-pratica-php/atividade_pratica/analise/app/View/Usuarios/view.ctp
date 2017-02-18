<h1><?= $usuario['Usuario']['nome_usuario']; ?></h1>

<p>ID: <?= $usuario['Usuario']['id']; ?></p>
<p>Nome: <?= $usuario['Usuario']['nome_usuario']; ?></p>
<p>Senha: <?= $usuario['Usuario']['senha']; ?></p>
<p>Tipo: <?php
  $tipo = intval($usuario['Usuario']['tipo']);
  if($tipo == 1) {
    echo "ADMINISTRADOR";
  } else if($tipo == 2) {
    echo "OPERADOR";
  }
?></p>

<?= $this->Html->link("Voltar", array('controller' => 'usuarios', 'action' => 'index')); ?>
