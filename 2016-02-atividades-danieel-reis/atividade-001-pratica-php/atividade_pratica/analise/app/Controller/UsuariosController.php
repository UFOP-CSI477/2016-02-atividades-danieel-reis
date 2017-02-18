<?php

class UsuariosController extends AppController {

  public $helpers = array('Form');
  public $components = array('Flash');

  public function index() {
    $this->set('usuarios', $this->Usuario->find('all', array('order' => 'nome_usuario')));
	}

  public function view($id = null) {
    if(!$id) {
      throw new NotFoundException("Usuário Inválido!!!");
    }
    $usuario = $this->Usuario->findById($id);
    $this->set('usuario', $usuario);
  }

  public function index_login() {

  }

  public function validar() {
    $usuario = $this->Usuario->findAllByLoginAndSenha($this->data['Usuario']['login'], $this->data['Usuario']['senha']);

    if(!empty($usuario))
      return $usuario;
    else
      return false;
  }

  public function login() {
    if(!empty($this->data['Usuario']['login'])) {
      // Validar
      $usuario = $this->validar();

      if($usuario != false) {
        $this->Flash->set('Seja bem-vindo(a) ' . $usuario['0']['Usuario']['nome_usuario']);
        $this->Session->write('Usuario', $usuario);

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

  public function add() {
    if (empty($this->request->data)) { // Data esta vazio -> carregar campos para inclusao.
      $tipos = array("1" => "ADMINISTRADOR", "2" => "OPERADOR");
      $this->set('tipos', $tipos);
    } else {
      // Persistir os dados
      if ($this->Usuario->save($this->request->data)) {
        $this->Flash->set("Usuário inserido com sucesso !");
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException("Usuário Inválido!");
    }
    if (empty($this->request->data)) { // Data esta vazio -> carregar campos para edicao.
      $tipos = array("1" => "ADMINISTRADOR", "2" => "OPERADOR");
      $this->set('tipos', $tipos);
      // Carregar os dados atuais
      $this->request->data = $this->Usuario->findById($id);
    } else {
      // Persistir os dados
      if ($this->Usuario->save($this->request->data)) {
        $this->Flash->set("Usuario atualizado com sucesso !");
        $this->redirect(array('action' => 'index'));
      }
    }
  }

  public function delete($id = null) {
    if (!$id) {
      throw new NotFoundException("Usuário Inválido!");
    }
    $this->Usuario->delete($id);
    $this->Flash->set("Usuário excluído com sucesso !");
    $this->redirect(array('action' => 'index'));
  }


}

?>
