<h1>Acesso ao sistema</h1>

<?php
  echo $this->Form->create('Usuario', array('controller' => 'usuarios', 'url' => 'login'));
  echo $this->Form->input('login');
  echo $this->Form->password('senha');
  echo $this->Form->end('Acessar');
?>

<h1>Area de acesso do Paciente</h1>

<?php
  echo $this->Form->create('Paciente', array('controller' => 'pacientes', 'url' => 'login'));
  echo $this->Form->input('login');
  echo $this->Form->password('senha');
  echo $this->Form->end('Acessar');
?>
