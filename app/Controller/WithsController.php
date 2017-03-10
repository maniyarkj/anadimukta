<?php

App::uses('AppController', 'Controller');

/**
 * Withs Controller
 *
 * @property With $With
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class WithsController extends AppController
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
        $this->With->recursive = 0;
        $this->set('withs', $this->Paginator->paginate());
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
        if (!$this->With->exists($id)) {
            throw new NotFoundException(__('Invalid with'));
        }
        $options = array('conditions' => array('With.' . $this->With->primaryKey => $id));
        $this->set('with', $this->With->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->With->create();
            if ($this->With->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The with has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The with could not be saved. Please, try again.'),
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
        if (!$this->With->exists($id)) {
            throw new NotFoundException(__('Invalid with'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['With']['id'] = intval($id);
            if ($this->With->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The with has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The with could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('With.' . $this->With->primaryKey => $id));
            $this->request->data = $this->With->find('first', $options);
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
        $this->With->id = $id;
        if (!$this->With->exists()) {
            throw new NotFoundException(__('Invalid with'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->With->delete()) {
            $this->Session->setFlash(__('The with has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The with could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}