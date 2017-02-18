<h1>Editar Usuario</h1>

<?php

  echo $this->Form->create('Usuario');
  echo $this->Form->input('nome_usuario');
  echo $this->Form->input('login');
  echo $this->Form->input('senha');
  echo $this->Form->select('tipo', $tipos);

  echo $this->Form->end('Salvar');

  $this->Html->link("Voltar", array('controller' => 'pages', 'action' => 'home'));
?>
