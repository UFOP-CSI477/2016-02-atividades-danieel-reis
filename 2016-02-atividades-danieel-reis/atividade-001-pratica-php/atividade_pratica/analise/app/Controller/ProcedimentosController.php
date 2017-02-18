<?php
class ProcedimentosController extends AppController {

  public $helders = array('Html', 'Form');
  public $components = array('Flash');

  public function index() {
    $this->set('procedimentos', $this->Procedimento->find('all', array('order' => 'nome')));
  }

  public function view($id = null) {
    if(!$id) {
      throw new NotFoundException("Procedimento Inválido!!!");
    }
    $procedimento = $this->Procedimento->findById($id);
    $this->set('procedimento', $procedimento);
  }

  public function add() {
    if (empty($this->request->data)) { // Data esta vazio -> carregar campos para inclusao.
      $usuarios = $this->Procedimento->Usuario->find('list', array('fields' => array('id', 'nome_usuario')));
      $this->set('usuarios', $usuarios);
    } else {
      // Persistir os dados
      if ($this->Procedimento->save($this->request->data)) {
        $this->Flash->set("Procedimento inserido com sucesso !");
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException("Procedimento Inválido!");
    }
    if (empty($this->request->data)) { // Data esta vazio -> carregar campos para edicao.
      $procedimentos = $this->Procedimento->find('all');
      $this->set('procedimentos', $procedimentos);
      $usuarios = $this->Procedimento->Usuario->find('list', array('fields' => array('id', 'nome_usuario')));
      $this->set('usuarios', $usuarios);
      // Carregar os dados atuais
      $this->request->data = $this->Procedimento->findById($id);
    } else {
      // Persistir os dados
      if ($this->Procedimento->save($this->request->data)) {
        $this->Flash->set("Procedimento atualizado com sucesso !");
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function delete($id = null) {
    if (!$id) {
      throw new NotFoundException("Procedimento Inválido!");
    }
    $this->Procedimento->delete($id);
    $this->Flash->set("Procedimento excluído com sucesso !");
    $this->redirect(array('action' => 'index'));
  }
}
?>
