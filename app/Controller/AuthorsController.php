<?php

App::uses('AppController', 'Controller');

/**
 * Authors Controller
 *
 * @property Author $Author
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AuthorsController extends AppController
{
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    /**
     * Layout
     *
     * @var string
     */
    public $layout = 'admin';

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Author->recursive = 0;
        $this->set('authors', $this->Paginator->paginate());
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
        if (!$this->Author->exists($id)) {
            throw new NotFoundException(__('Invalid author'));
        }
        $options = array('conditions' => array('Author.' . $this->Author->primaryKey => $id));
        $this->set('author', $this->Author->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Author->create();
            if ($this->Author->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The author has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The author could not be saved. Please, try again.'),
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
        if (!$this->Author->exists($id)) {
            throw new NotFoundException(__('Invalid author'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Author']['id'] = intval($id);
            if ($this->Author->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The author has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The author could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Author.' . $this->Author->primaryKey => $id));
            $this->request->data = $this->Author->find('first', $options);
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
        $this->Author->id = $id;
        if (!$this->Author->exists()) {
            throw new NotFoundException(__('Invalid author'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Author->delete()) {
            $this->Session->setFlash(__('The author has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The author could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}