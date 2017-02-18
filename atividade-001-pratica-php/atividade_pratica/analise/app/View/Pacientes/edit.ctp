<h1>Editar Pacientes</h1>

<?php
  echo $this->Form->create('Paciente');
  echo $this->Form->input('id');
  echo $this->Form->input('nome');
  echo $this->Form->input('login');
  echo $this->Form->input('senha');
  
  echo $this->Form->end('Salvar');
?>
