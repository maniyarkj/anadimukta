<?php

App::uses('AppController', 'Controller');

/**
 * Traditions Controller
 *
 * @property Tradition $Tradition
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TraditionsController extends AppController
{

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = array('Text');

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
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'bookra';

//        $this->Tradition->recursive = 0;
//        $this->set('traditions', $this->Tradition->find('all', array(
//            'conditions' => array('Tradition.is_visible' => 1),
//            'order' => array('Tradition.sortorder'),
//        )));
        // Traditions
        $traditions = $this->Tradition->find('all', array(
            'conditions' => array(
                'Tradition.is_visible' => 1,
                'Tradition.is_main !=' => 1,
            ),
            'order' => array('Tradition.sortorder'),
        ));
        $mainTraditions = $this->Tradition->find('all', array(
            'conditions' => array(
                'Tradition.is_visible' => 1,
                'Tradition.is_main' => 1,
            ),
            'order' => array('Tradition.sortorder'),
            'limit' => 1,
        ));
        $mainTradition = array();
        if ($mainTraditions) {
            $mainTradition = array_shift($mainTraditions);
        }
        $this->set(compact('mainTradition', 'traditions'));
        $this->set('title', __('Spritual Succession'));
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

        if (!$this->Tradition->exists($id)) {
            throw new NotFoundException(__('Invalid tradition'));
        }
        $options = array('conditions' => array('Tradition.' . $this->Tradition->primaryKey => $id));
        $tradition = $this->Tradition->find('first', $options);
        $this->set('tradition', $tradition);
        $this->set('title', $tradition['Tradition']['title']);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Tradition->recursive = 0;
        $this->set('traditions', $this->Paginator->paginate());
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
        if (!$this->Tradition->exists($id)) {
            throw new NotFoundException(__('Invalid tradition'));
        }
        $options = array('conditions' => array('Tradition.' . $this->Tradition->primaryKey => $id));
        $this->set('tradition', $this->Tradition->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Tradition->create();
            if ($this->Tradition->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The tradition has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The tradition could not be saved. Please, try again.'),
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
        if (!$this->Tradition->exists($id)) {
            throw new NotFoundException(__('Invalid tradition'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Tradition']['id'] = intval($id);
            if ($this->Tradition->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The tradition has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The tradition could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Tradition.' . $this->Tradition->primaryKey => $id));
            $this->request->data = $this->Tradition->find('first', $options);
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
        $this->Tradition->id = $id;
        if (!$this->Tradition->exists()) {
            throw new NotFoundException(__('Invalid tradition'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Tradition->delete()) {
            $this->Session->setFlash(__('The tradition has been deleted.'), 'default',
                    array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The tradition could not be deleted. Please, try again.'),
                    'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
