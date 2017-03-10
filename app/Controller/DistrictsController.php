<?php

App::uses('AppController', 'Controller');

/**
 * Districts Controller
 *
 * @property District $District
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DistrictsController extends AppController
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
        $this->District->recursive = 0;
        $this->set('districts', $this->Paginator->paginate());
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
        if (!$this->District->exists($id)) {
            throw new NotFoundException(__('Invalid district'));
        }
        $options = array('conditions' => array('District.' . $this->District->primaryKey => $id));
        $this->set('district', $this->District->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->District->create();
            if ($this->District->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The district has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The district could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $countries = $this->District->Country->find('list');
        $states = $this->District->State->find('list');
        $this->set(compact('countries', 'states'));
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
        if (!$this->District->exists($id)) {
            throw new NotFoundException(__('Invalid district'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['District']['id'] = intval($id);
            if ($this->District->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The district has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The district could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('District.' . $this->District->primaryKey => $id));
            $this->request->data = $this->District->find('first', $options);
        }
        $countries = $this->District->Country->find('list');
        $states = $this->District->State->find('list');
        $this->set(compact('countries', 'states'));
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
        $this->District->id = $id;
        if (!$this->District->exists()) {
            throw new NotFoundException(__('Invalid district'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->District->delete()) {
            $this->Session->setFlash(__('The district has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The district could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getByCountryState()
    {
        $this->layout = 'ajax';
        $country_id = $this->request->data['country_id'];
        $state_id = $this->request->data['state_id'];
        $value = isset($this->request->data['district_id'])
                ? $this->request->data['district_id']
                : '';

        $districts = $this->District->find('list', array(
            'conditions' => array(
                'District.country_id'=> $country_id,
                'District.state_id'=> $state_id,
            ),
            'recursive' => -1
        ));
        $this->set(compact('districts', 'value'));
    }

}