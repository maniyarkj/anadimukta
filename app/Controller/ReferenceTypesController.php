<?php

App::uses('AppController', 'Controller');

/**
 * ReferenceTypes Controller
 *
 * @property ReferenceType $ReferenceType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ReferenceTypesController extends AppController
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
        $this->ReferenceType->recursive = 0;
        $this->set('referenceTypes', $this->Paginator->paginate());
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
        if (!$this->ReferenceType->exists($id)) {
            throw new NotFoundException(__('Invalid reference type'));
        }
        $options = array('conditions' => array('ReferenceType.' . $this->ReferenceType->primaryKey => $id));
        $this->set('referenceType', $this->ReferenceType->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->ReferenceType->create();
            if ($this->ReferenceType->save($this->request->data)) {
                $this->Session->setFlash(__('The reference type has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The reference type could not be saved. Please, try again.'),
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
        if (!$this->ReferenceType->exists($id)) {
            throw new NotFoundException(__('Invalid reference type'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ReferenceType->save($this->request->data)) {
                $this->Session->setFlash(__('The reference type has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The reference type could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('ReferenceType.' . $this->ReferenceType->primaryKey => $id));
            $this->request->data = $this->ReferenceType->find('first', $options);
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
        $this->ReferenceType->id = $id;
        if (!$this->ReferenceType->exists()) {
            throw new NotFoundException(__('Invalid reference type'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->ReferenceType->delete()) {
            $this->Session->setFlash(__('The reference type has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The reference type could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}