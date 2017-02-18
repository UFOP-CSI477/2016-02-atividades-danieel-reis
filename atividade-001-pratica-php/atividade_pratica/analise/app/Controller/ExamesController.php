<?php
class ExamesController extends AppController {

  public $helders = array('Html', 'Form');
  public $components = array('Flash');

  public function index() {
    $this->set('exames', $this->Exame->find('all'));
	}

  public function view($id = null) {
    if(!$id) {
      throw new NotFoundException("Exame Inválido!!!");
    }
    $exame = $this->Exame->findById($id);
    $this->set('exame', $exame);
  }

  public function view_paciente($id = null) {
    if(!$id) {
      throw new NotFoundException("Paciente Inválido!!!");
    }
    $paciente = $this->Exame->Paciente->findById($id);
    $this->set('paciente', $paciente);
  }

  public function view_procedimento($id = null) {
    if(!$id) {
      throw new NotFoundException("Procedimento Inválido!!!");
    }
    $procedimento = $this->Exame->Procedimento->findById($id);
    $this->set('procedimento', $procedimento);
  }

  public function add() {
    if (empty($this->request->data)) { // Data esta vazio -> carregar campos para inclusao.
      $procedimentos = $this->Exame->Procedimento->find('list', array('fields' => array('id', 'nome')));
      $this->set('procedimentos', $procedimentos);
      $pacientes = $this->Exame->Paciente->find('list', array('fields' => array('id', 'nome')));
      $this->set('pacientes', $pacientes);
    } else {
      // Persistir os dados
      if ($this->Exame->save($this->request->data)) {
        $this->Flash->set("Exame inserido com sucesso !");
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException("Exame Inválido!");
    }
    if (empty($this->request->data)) { // Data esta vazio -> carregar campos para edicao.
      $procedimentos = $this->Exame->Procedimento->find('list', array('fields' => array('id', 'nome')));
      $pacientes = $this->Exame->Paciente->find('list', array('fields' => array('id', 'nome')));
      $this->set('procedimentos', $procedimentos);
      $this->set('pacientes', $pacientes);
      // Carregar os dados atuais
      $this->request->data = $this->Exame->findById($id);
    } else {
      // Persistir os dados
      if ($this->Exame->save($this->request->data)) {
        $this->Flash->set("Exame atualizado com sucesso !");
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function delete($id = null) {
    if (!$id) {
      throw new NotFoundException("Exame Inválido!");
    }
    $this->Exame->delete($id);
    $this->Flash->set("Exame excluído com sucesso !");
    $this->redirect(array('action' => 'index'));
  }

}
?>
