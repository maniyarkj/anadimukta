<?php

App::uses('AppController', 'Controller');

/**
 * References Controller
 *
 * @property Reference $Reference
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ReferencesController extends AppController
{
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * Current authenticated user
     *
     * @var array
     */
    protected $_currentUser = null;

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->_currentUser = $this->Auth->user();
        $this->set('currentUser', $this->_currentUser);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Reference->recursive = 0;
        $this->set('references', $this->Paginator->paginate());
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
        if (!$this->Reference->exists($id)) {
            throw new NotFoundException(__('Invalid reference'));
        }
        $options = array('conditions' => array('Reference.' . $this->Reference->primaryKey => $id));
        $this->set('reference', $this->Reference->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Reference->create();
            if ($this->Reference->save($this->request->data)) {
                $this->Session->setFlash(__('The reference has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The reference could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $referenceTypes = $this->Reference->ReferenceType->find('list');
        $dtpUsers = $this->Reference->DtpUser->find('list');
        $publishedBies = $this->Reference->PublishedBy->find('list');
        $subjects = $this->Reference->Subject->find('list');
        $this->set(compact('referenceTypes', 'dtpUsers', 'publishedBies', 'subjects'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Reference->exists($id)) {
            throw new NotFoundException(__('Invalid reference'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Reference->save($this->request->data)) {
                $this->Session->setFlash(__('The reference has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The reference could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Reference.' . $this->Reference->primaryKey => $id));
            $this->request->data = $this->Reference->find('first', $options);
        }
        $referenceTypes = $this->Reference->ReferenceType->find('list');
        $dtpUsers = $this->Reference->DtpUser->find('list');
        $publishedBies = $this->Reference->PublishedBy->find('list');
        $subjects = $this->Reference->Subject->find('list');
        $this->set(compact('referenceTypes', 'dtpUsers', 'publishedBies', 'subjects'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Reference->id = $id;
        if (!$this->Reference->exists()) {
            throw new NotFoundException(__('Invalid reference'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Reference->delete()) {
            $this->Session->setFlash(__('The reference has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The reference could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Reference->recursive = 0;
        $references = $this->Paginator->paginate();
        $statuses = $this->Reference->getStatusOptions();
        $this->set(compact('references', 'statuses'));
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
        if (!$this->Reference->exists($id)) {
            throw new NotFoundException(__('Invalid reference'));
        }
        $options = array('conditions' => array('Reference.' . $this->Reference->primaryKey => $id));
        $this->set('reference', $this->Reference->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Reference->create();
            if ($this->_currentUser['type'] == User::TYPE_DTP) {
                $this->request->data['Reference']['created_by_user_id'] = $this->_currentUser['id'];
            }
            if ($this->Reference->save($this->request->data)) {
                $this->Session->setFlash(__('The reference has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The reference could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $referenceTypes = $this->Reference->ReferenceType->find('list');
        $subjects = $this->Reference->Subject->getSelectOptions();
        $statuses = $this->Reference->getStatusOptions();
        $grades = $this->Reference->getGradeOptions();
        $this->set(compact('referenceTypes', 'dtpUsers', 'publishedBies', 'subjects',
                'statuses', 'grades'));
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
        if (!$this->Reference->exists($id)) {
            throw new NotFoundException(__('Invalid reference'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Reference']['id'] = $id;
            if ($this->Reference->save($this->request->data)) {
                $this->Session->setFlash(__('The reference has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The reference could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array(
                'conditions' => array('Reference.' . $this->Reference->primaryKey => $id)
            );
            $this->request->data = $this->Reference->find('first', $options);
        }
        $referenceTypes = $this->Reference->ReferenceType->find('list');
        $subjects = $this->Reference->Subject->getSelectOptions();
        $statuses = $this->Reference->getStatusOptions();
        $grades = $this->Reference->getGradeOptions();
        $this->set(compact('referenceTypes', 'dtpUsers', 'publishedBies', 'subjects',
                'statuses', 'grades'));
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
        $this->Reference->id = $id;
        if (!$this->Reference->exists()) {
            throw new NotFoundException(__('Invalid reference'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Reference->delete()) {
            $this->Session->setFlash(__('The reference has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The reference could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}