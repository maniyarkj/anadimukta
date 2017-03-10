<?php

App::uses('AppController', 'Controller');

/**
 * Zones Controller
 *
 * @property Zone $Zone
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ZonesController extends AppController
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
        $this->Zone->recursive = 0;
        $this->set('zones', $this->Paginator->paginate());
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
        if (!$this->Zone->exists($id)) {
            throw new NotFoundException(__('Invalid zone'));
        }
        $options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
        $this->set('zone', $this->Zone->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Zone->create();
            if ($this->Zone->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The zone has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The zone could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
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
        if (!$this->Zone->exists($id)) {
            throw new NotFoundException(__('Invalid zone'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Zone']['id'] = intval($id);
            if ($this->Zone->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The zone has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The zone could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
            $this->request->data = $this->Zone->find('first', $options);
        }
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
        $this->Zone->id = $id;
        if (!$this->Zone->exists()) {
            throw new NotFoundException(__('Invalid zone'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Zone->delete()) {
            $this->Session->setFlash(__('The zone has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The zone could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}