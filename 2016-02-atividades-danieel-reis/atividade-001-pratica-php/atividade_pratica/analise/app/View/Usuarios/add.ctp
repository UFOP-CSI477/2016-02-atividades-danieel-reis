<h1>Inserir Usuário</h1>

<?php
  echo $this->Form->create('Usuario');
  echo $this->Form->input('nome_usuario');
  echo $this->Form->input('login');
  echo $this->Form->input('senha');
  echo $this->Form->select('tipo', $tipos);
  echo $this->Form->end('Salvar');
 ?>
