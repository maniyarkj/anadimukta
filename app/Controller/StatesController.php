<?php

App::uses('AppController', 'Controller');

/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StatesController extends AppController
{
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->State->recursive = 0;
        $this->set('states', $this->Paginator->paginate());
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
        if (!$this->State->exists($id)) {
            throw new NotFoundException(__('Invalid state'));
        }
        $options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
        $this->set('state', $this->State->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->State->create();
            if ($this->State->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The state has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The state could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $countries = $this->State->Country->find('list');
        $this->set(compact('countries'));
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
        if (!$this->State->exists($id)) {
            throw new NotFoundException(__('Invalid state'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['State']['id'] = $id;
            if ($this->State->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The state has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The state could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
            $this->request->data = $this->State->find('first', $options);
        }
        $countries = $this->State->Country->find('list');
        $this->set(compact('countries'));
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
        $this->State->id = $id;
        if (!$this->State->exists()) {
            throw new NotFoundException(__('Invalid state'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->State->delete()) {
            $this->Session->setFlash(__('The state has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The state could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getByCountry()
    {
        $this->layout = 'ajax';
        $country_id = $this->request->data['country_id'];
        $value = isset($this->request->data['state_id']) ? $this->request->data['state_id'] : 0;

        $states = $this->State->find('list', array(
            'conditions' => array(
                'State.country_id'=> $country_id
            ),
            'recursive' => -1
        ));
        $this->set(compact('states', 'value'));
    }
}