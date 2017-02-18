<h1>Editar Exames</h1>

<?php
  echo $this->Form->create('Exame');
  echo $this->Form->input('id');
  echo $this->Form->input('paciente_id', $pacientes);
  echo $this->Form->input('procedimento_id', $procedimentos);
  echo $this->Form->input('data');

  echo $this->Form->end('Salvar');
?>
