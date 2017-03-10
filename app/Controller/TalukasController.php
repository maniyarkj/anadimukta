<?php

App::uses('AppController', 'Controller');

/**
 * Talukas Controller
 *
 * @property Taluka $Taluka
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TalukasController extends AppController
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
        $this->Taluka->recursive = 0;
        $this->set('talukas', $this->Paginator->paginate());
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
        if (!$this->Taluka->exists($id)) {
            throw new NotFoundException(__('Invalid taluka'));
        }
        $options = array('conditions' => array('Taluka.' . $this->Taluka->primaryKey => $id));
        $this->set('taluka', $this->Taluka->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Taluka->create();
            if ($this->Taluka->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The taluka has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The taluka could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $districts = $this->Taluka->District->find('list');
        $states = $this->Taluka->State->find('list');
        $countries = $this->Taluka->Country->find('list');
        $this->set(compact('cities', 'districts', 'states', 'countries'));
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
        if (!$this->Taluka->exists($id)) {
            throw new NotFoundException(__('Invalid taluka'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Taluka']['id'] = intval($id);
            if ($this->Taluka->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The taluka has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The taluka could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Taluka.' . $this->Taluka->primaryKey => $id));
            $this->request->data = $this->Taluka->find('first', $options);
        }
        $districts = $this->Taluka->District->find('list');
        $states = $this->Taluka->State->find('list');
        $countries = $this->Taluka->Country->find('list');
        $this->set(compact('cities', 'districts', 'states', 'countries'));
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
        $this->Taluka->id = $id;
        if (!$this->Taluka->exists()) {
            throw new NotFoundException(__('Invalid taluka'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Taluka->delete()) {
            $this->Session->setFlash(__('The taluka has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The taluka could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getByCountryStateDistrict()
    {
        $this->layout = 'ajax';
        $country_id = $this->request->data['country_id'];
        $state_id = $this->request->data['state_id'];
        $district_id = $this->request->data['district_id'];
        $value = $this->request->data['taluka_id'];

        $talukas = $this->Taluka->find('list', array(
            'conditions' => array(
                'Taluka.country_id'=> $country_id,
                'Taluka.state_id'=> $state_id,
                'Taluka.district_id'=> $district_id,
            ),
            'recursive' => -1
        ));
        $this->set(compact('talukas', 'value'));
    }
}