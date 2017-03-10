<?php

App::uses('AppController', 'Controller');
App::uses('User', 'Model');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController
{
    var $components = array('Search.Prg');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->User->recursive = 0;
        $this->Prg->commonProcess();
        $this->Paginator->settings['conditions'] = $this->User->parseCriteria($this->Prg->parsedParams());
        $this->Paginator->settings['conditions'] += array(
            'User.group_id != ' . $this->User->getGroupIdByType(User::TYPE_GENERAL)
        );
        $this->set('users', $this->Paginator->paginate());

        $canChangeUserParmission = $this->Acl->check(
            array(
                'model' => 'Group',
                'foreign_key' => $this->Session->read('Auth.User.group_id')
            ),
            'aros/admin_grant_user_permission'
        );

        $groups = $this->User->Group->find('list');
        $this->set(compact('groups', 'canChangeUserParmission'));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $types = $this->User->getGroupOptions();
        $this->set(compact('types'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['User']['id'] = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $types = $this->User->getGroupOptions();
        $this->set(compact('types'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Action to login
     */
    public function login()
    {
        $this->layout = 'login';

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->_redirectLogin($this->Auth->user());
            }
            $this->Session->setFlash(__('Your username or password was incorrect.'));
        }
        $this->loadModel('UserDetail');
        $this->loadModel('City');
        $states = $this->City->State->find('list');
        $countries = $this->City->Country->find('list');
        $districts = $this->City->District->find('list');
        $genders = $this->UserDetail->getGenderOptions();
        $this->set(compact('states', 'countries', 'districts', 'genders'));
    }

    /**
     * Action to logout
     */
    public function logout()
    {
        $this->Session->setFlash('Good-Bye');
        $this->redirect($this->Auth->logout());
    }

    /**
     * Action to logout
     */
    public function register()
    {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('Thank you for registering. Please login using username and password'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'login'));
            }
            else {
                $this->Session->setFlash(__('There was some error. Please check your details.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $this->loadModel('UserDetail');
        $this->loadModel('City');
        $states = $this->City->State->find('list');
        $countries = $this->City->Country->find('list');
        $districts = $this->City->District->find('list');
        $genders = $this->UserDetail->getGenderOptions();
        $this->set(compact('states', 'countries', 'districts', 'genders'));
    }

    /**
     * Redirect user based on role
     *
     * @param array $user
     * @return type
     */
    protected function _redirectLogin($user)
    {
        if ($this->User->isAdmin($user) || $this->User->isPrasangAdmin($user)) {
            return $this->redirect(array(
                'controller' => 'index',
                'action' => 'index',
                'admin' => true,
            ));
        }
        if ($this->User->isSlvAdmin($user)) {
            return $this->redirect(array(
                'controller' => 'prasangs',
                'action' => 'uploaded',
                'admin' => true,
            ));
        }
        if ($this->User->isDtpAdmin($user)) {
            return $this->redirect(array(
                'controller' => 'prasangs',
                'action' => 'dtp',
                'admin' => true,
            ));
        }
        if ($this->User->isGeneralUser($user)) {
            return $this->redirect(array(
                'controller' => 'index',
                'action' => 'index',
                'admin' => false,
            ));
        }
        // TODO: Add Reference Admin redirect
        $this->redirect($this->Auth->redirectUrl());
    }

    public function check_username()
    {
        $this->layout = 'ajax';
        $username = $this->request->data['username'];
        if (mb_strlen($username) === 0) {
            echo "Choose a username";
        }
        elseif (mb_strlen ($username) < 5) {
            echo "Too Short Username!";
        }
        else {
            if ($this->request->is('ajax')) {
                if (!$this->User->isUsernameAvailable($username)) {
                    echo __('<span class="not-available">Username Taken!</span>');
                }
                else {
                    echo __('<span class="available">Available</span>');
                }
            }
        }
        exit;
    }

}