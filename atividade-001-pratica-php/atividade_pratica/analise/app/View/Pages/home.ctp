<span class="notice success">
  <?= $this->Html-> link("Usuarios", array('controller' => 'usuarios', 'action' => 'index')); ?>
</span>
<span class="notice success">
  <?= $this->Html-> link("Exames", array('controller' => 'exames', 'action' => 'index')); ?>
</span>
<span class="notice success">
  <?= $this->Html-> link("Pacientes", array('controller' => 'pacientes', 'action' => 'index')); ?>
</span>
<span class="notice success">
  <?= $this->Html-> link("Procedimentos", array('controller' => 'procedimentos', 'action' => 'index')); ?>
</span>
<span class="notice success">
  <?= $this->Html->link("Sair do Sistema ", array('controller' => 'usuarios', 'action' => 'logout')); ?>
</span>
