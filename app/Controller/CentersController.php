<?php

App::uses('AppController', 'Controller');

/**
 * Centers Controller
 *
 * @property Center $Center
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CentersController extends AppController
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
        $this->Auth->allow('getByZone');
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Center->recursive = 0;
        $this->set('centers', $this->Paginator->paginate());
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
        if (!$this->Center->exists($id)) {
            throw new NotFoundException(__('Invalid center'));
        }
        $options = array('conditions' => array('Center.' . $this->Center->primaryKey => $id));
        $this->set('center', $this->Center->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Center->create();
            if ($this->Center->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The center has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The center could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $zones = $this->Center->Zone->find('list');
        $this->set(compact('zones'));
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
        if (!$this->Center->exists($id)) {
            throw new NotFoundException(__('Invalid center'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Center']['id'] = intval($id);
            if ($this->Center->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The center has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The center could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Center.' . $this->Center->primaryKey => $id));
            $this->request->data = $this->Center->find('first', $options);
        }
        $zones = $this->Center->Zone->find('list');
        $this->set(compact('zones'));
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
        $this->Center->id = $id;
        if (!$this->Center->exists()) {
            throw new NotFoundException(__('Invalid center'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Center->delete()) {
            $this->Session->setFlash(__('The center has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The center could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getByZone()
    {
        $this->layout = 'ajax';
        $zone_id = $this->request->data['zone_id'];
        $value = $this->request->data['center_id'];

        $centers = $this->Center->find('list', array(
            'conditions' => array(
                'Center.zone_id'=> $zone_id
            ),
            'recursive' => -1
        ));
        $this->set(compact('centers', 'value'));
    }

}