<?php

App::uses('AppController', 'Controller');

/**
 * Pages Controller
 *
 * @property Page $Page
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PagesController extends AppController
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
        $this->Auth->allow('view');

        $user = $this->Auth->user();
        $this->set('user', $user);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        $this->layout = 'bookra';

        if (!$this->Page->exists($id)) {
            throw new NotFoundException(__('Invalid page'));
        }
        $options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
        $page = $this->Page->find('first', $options);
        $this->set('page', $page);
        $this->set('title', $page['Page']['title']);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Page->recursive = 0;
        $this->set('pages', $this->Paginator->paginate());
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
        if (!$this->Page->exists($id)) {
            throw new NotFoundException(__('Invalid page'));
        }
        $options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
        $this->set('page', $this->Page->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Page->create();
            if ($this->Page->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The page has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.'),
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
        if (!$this->Page->exists($id)) {
            throw new NotFoundException(__('Invalid page'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Page']['id'] = intval($id);
            if ($this->Page->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The page has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
            $this->request->data = $this->Page->find('first', $options);
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
        $this->Page->id = $id;
        if (!$this->Page->exists()) {
            throw new NotFoundException(__('Invalid page'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Page->delete()) {
            $this->Session->setFlash(__('The page has been deleted.'), 'default',
                    array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The page could not be deleted. Please, try again.'),
                    'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
