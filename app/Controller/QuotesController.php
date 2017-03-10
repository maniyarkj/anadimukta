<?php

App::uses('AppController', 'Controller');

/**
 * Quotes Controller
 *
 * @property Quote $Quote
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuotesController extends AppController
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
        $this->Auth->allow('view', 'index');
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Quote->recursive = 0;
        $this->set('quotes', $this->Paginator->paginate());
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
        if (!$this->Quote->exists($id)) {
            throw new NotFoundException(__('Invalid quote'));
        }
        $options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
        $this->set('quote', $this->Quote->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Quote->create();
            if ($this->Quote->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The quote has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The quote could not be saved. Please, try again.'),
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
        if (!$this->Quote->exists($id)) {
            throw new NotFoundException(__('Invalid quote'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Quote']['id'] = $id;
            if ($this->Quote->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The quote has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The quote could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
            $this->request->data = $this->Quote->find('first', $options);
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
        $this->Quote->id = $id;
        if (!$this->Quote->exists()) {
            throw new NotFoundException(__('Invalid quote'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Quote->delete()) {
            $this->Session->setFlash(__('The quote has been deleted.'), 'default',
                    array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The quote could not be deleted. Please, try again.'),
                    'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
