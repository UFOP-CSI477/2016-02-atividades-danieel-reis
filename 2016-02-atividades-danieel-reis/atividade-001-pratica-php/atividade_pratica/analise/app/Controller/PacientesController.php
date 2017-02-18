<?php
class PacientesController extends AppController {

  public $helders = array('Html', 'Form');
  public $components = array('Flash');

  public function index() {
    $this->set('pacientes', $this->Paciente->find('all', array('order' => 'nome')));
  }

  public function index_login() {

  }

  public function validar() {
    $paciente = $this->Paciente->findAllByLoginAndSenha($this->data['Paciente']['login'], $this->data['Paciente']['senha']);

    if(!empty($paciente))
      return $paciente;
    else
      return false;
  }

  public function view($id = null) {
    if(!$id) {
      throw new NotFoundException("Paciente Inválido!!!");
    }
    $paciente = $this->Paciente->findById($id);
    $this->set('paciente', $paciente);
  }

  public function add() {
    if (empty($this->request->data)) { // Data esta vazio -> carregar campos para inclusao.
      $pacientes = $this->Paciente->find('all');
      $this->set('pacientes', $pacientes);
    } else {
      // Persistir os dados
      if ($this->Paciente->save($this->request->data)) {
        $this->Flash->set("Paciente inserido com sucesso !");
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function login() {
    if(!empty($this->data['Paciente']['login'])) {
      // Validar
      $paciente = $this->validar();

      if($usuario != false) {
        $this->Flash->set('Seja bem-vindo(a) ' . $paciente['0']['Paciente']['nome']);
        $this->Session->write('Paciente', $paciente);

        $this->redirect('/');
        exit();
      } else {
        $this->Flash->set('Usuário e/ou senha inválidos!!!');
        $this->redirect(array('action' => 'index_login'));
        exit();
      }
    } else {
      $this->redirect(array('action' => 'index_login'));
      exit();
    }
  }

  public function logout() {
      $this->Flash->set('Atividades encerradas com sucesso!');
      $this->redirect(array('action' => 'index_login'));
      exit();
  }

  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException("Paciente Inválido!");
    }
    if (empty($this->request->data)) { // Data esta vazio -> carregar campos para edicao.
      $pacientes = $this->Paciente->find('all');
      $this->set('pacientes', $pacientes);
      // Carregar os dados atuais
      $this->request->data = $this->Paciente->findById($id);
    } else {
      // Persistir os dados
      if ($this->Paciente->save($this->request->data)) {
        $this->Flash->set("Paciente atualizado com sucesso !");
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function delete($id = null) {
    if (!$id) {
      throw new NotFoundException("Paciente Inválido!");
    }
    $this->Paciente->delete($id);
    $this->Flash->set("Paciente excluído com sucesso !");
    $this->redirect(array('action' => 'index'));
  }
}
?>
