<?php

App::uses('AppController', 'Controller');

/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventsController extends AppController
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
        $this->Event->recursive = 0;
        $this->set('events', $this->Paginator->paginate());
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
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        $this->layout = 'bookra';

        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));

        // Other Events
        $otherEvents = $this->Event->find('all', array(
            'conditions' => array(
                'Event.is_featured' => 1,
                'Event.is_visible' => 1,
                'Event.id != ' . $id,
            ),
            'order' => array('Event.modified desc'),
            'limit' => 5,
        ));
        $this->set('otherEvents', $otherEvents);
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }

        $timeOptions = $this->Event->getTimeOptions();
        $this->set(compact('timeOptions'));
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
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Event']['id'] = $id;
            if ($this->Event->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }

        $timeOptions = $this->Event->getTimeOptions();
        $this->set(compact('timeOptions'));
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
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('The event has been deleted.'), 'default',
                    array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'),
                    'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'bookra';
        $this->Event->recursive = 0;
        $this->set('events', $this->Paginator->paginate());
    }
}
