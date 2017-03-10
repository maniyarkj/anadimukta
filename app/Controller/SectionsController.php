<?php

App::uses('AppController', 'Controller');

/**
 * Sections Controller
 *
 * @property Section $Section
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SectionsController extends AppController
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
        $this->Section->recursive = 1;
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Section->recursive = 0;
        $this->Paginator->settings = array(
            'order' => array('Section.sortorder' => 'asc'),
        );
        $this->set('sections', $this->Paginator->paginate());
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
        if (!$this->Section->exists($id)) {
            throw new NotFoundException(__('Invalid section'));
        }
        $options = array('conditions' => array('Section.' . $this->Section->primaryKey => $id));
        $this->set('section', $this->Section->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Section->create();
            if ($this->Section->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The section has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The section could not be saved. Please, try again.'),
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
        if (!$this->Section->exists($id)) {
            throw new NotFoundException(__('Invalid section'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Section']['id'] = $id;
            if ($this->Section->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The section has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The section could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Section.' . $this->Section->primaryKey => $id));
            $this->request->data = $this->Section->find('first', $options);
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
        $this->Section->id = $id;
        if (!$this->Section->exists()) {
            throw new NotFoundException(__('Invalid section'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Section->delete()) {
            $this->Session->setFlash(__('The section has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The section could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}