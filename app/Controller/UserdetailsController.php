<?php

App::uses('AppController', 'Controller');

/**
 * UserDetails Controller
 *
 * @property UserDetail $UserDetail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UserDetailsController extends AppController
{
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    public function beforeFilter()
    {
        parent::beforeFilter();

        $this->loadModel('UserType');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->UserDetail->recursive = 0;
        $this->set('userDetails', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->UserDetail->exists($id)) {
            throw new NotFoundException(__('Invalid user detail'));
        }
        $options = array('conditions' => array('UserDetail.' . $this->UserDetail->primaryKey => $id));
        $this->set('userDetail', $this->UserDetail->find('first', $options));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->UserDetail->recursive = 0;
        $this->set('userDetails', $this->Paginator->paginate());
        $userTypes = $this->UserType->find('list');
        $statuses = $this->UserDetail->getStatusOptions();
        $this->set(compact('userTypes', 'statuses'));
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
        if (!$this->UserDetail->exists($id)) {
            throw new NotFoundException(__('Invalid user detail'));
        }
        $options = array('conditions' => array('UserDetail.' . $this->UserDetail->primaryKey => $id));
        $this->set('userDetail', $this->UserDetail->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        $this->loadModel('User');
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['group_id'] = $this->User->getGroupIdByType(User::TYPE_GENERAL);
            if ($this->User->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The user detail has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user detail could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $users = $this->UserDetail->User->find('list');
        $userTypes = $this->UserType->find('list');
        $statuses = $this->UserDetail->getStatusOptions();
        $countries = $this->UserDetail->Country->find('list');
        $states = $this->UserDetail->State->find('list');
        $districts = $this->UserDetail->District->find('list');
        $talukas = $this->UserDetail->Taluka->find('list');
        $cities = $this->UserDetail->City->find('list');
        $zones = $this->UserDetail->Zone->find('list');
        $centers = $this->UserDetail->Center->find('list');
        $genders = $this->UserDetail->getGenderOptions();
        $this->set(compact('users', 'userTypes', 'countries', 'states', 'districts', 'talukas',
                           'cities', 'zones', 'centers', 'genders', 'statuses'));
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
        if (!$this->UserDetail->exists($id)) {
            throw new NotFoundException(__('Invalid user detail'));
        }
        $options = array('conditions' => array('UserDetail.' . $this->UserDetail->primaryKey => $id));
        $userDetails = $this->UserDetail->find('first', $options);
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['UserDetail']['id'] = $id;
            $this->request->data['User']['id'] = $userDetails['UserDetail']['user_id'];
            $this->request->data['UserDetail']['user_id'] = $userDetails['UserDetail']['user_id'];

            if ($this->UserDetail->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The user detail has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user detail could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $this->request->data = $userDetails;
        }
        $users = $this->UserDetail->User->find('list');
        $userTypes = $this->UserType->find('list');
        $statuses = $this->UserDetail->getStatusOptions();
        $countries = $this->UserDetail->Country->find('list');
        $states = $this->UserDetail->State->find('list');
        $districts = $this->UserDetail->District->find('list');
        $talukas = $this->UserDetail->Taluka->find('list');
        $cities = $this->UserDetail->City->find('list');
        $zones = $this->UserDetail->Zone->find('list');
        $centers = $this->UserDetail->Center->find('list');
        $genders = $this->UserDetail->getGenderOptions();
        $this->set(compact('users', 'userTypes', 'countries', 'states', 'districts', 'talukas',
                           'cities', 'zones', 'centers', 'genders', 'statuses'));
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
        $this->UserDetail->id = $id;
        if (!$this->UserDetail->exists()) {
            throw new NotFoundException(__('Invalid user detail'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->UserDetail->delete()) {
            $this->Session->setFlash(__('The user detail has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The user detail could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}