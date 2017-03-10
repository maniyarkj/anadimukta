<?php

App::uses('AppController', 'Controller');

/**
 * Feedback Controller
 *
 * @property Feedback $Feedback
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FeedbacksController extends AppController
{
    public $name = 'Feedbacks';
    public $uses = array('Feedback');
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Captcha.Captcha' => array('field'=>'security_code'));

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'captcha');
    }

    /**
     * Ajax captcha action
     */
//    function captcha()	{
//        $this->autoRender = false;
//        $this->layout='ajax';
//        if(!isset($this->Captcha))	{ //if you didn't load in the header
//            $this->Captcha = $this->Components->load('Captcha.Captcha'); //load it
//        }
//        $this->Captcha->create();
//    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Feedback->recursive = 0;
        $this->set('feedback', $this->Paginator->paginate());
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
        if (!$this->Feedback->exists($id)) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        $options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
        $this->set('feedback', $this->Feedback->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        $this->layout = 'bookra';
        if ($this->request->is('post')) {
            $this->Feedback->create();
//            // Getting from component and passing to model to make proper validation check
//            $this->Feedback->setCaptcha(
//                'security_code',
//                $this->Captcha->getCode('Feedback.security_code')
//            );
            if ($this->Feedback->save($this->request->data)) {
                $this->Session->setFlash(__('Thank you for sumitting the feedback.'), 'default',
                                            array('class' => 'alert alert alert-success'));
                return $this->redirect(array('action' => 'add'));
            }
            else {
                $this->Session->setFlash(__('The feedback could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $subjects = $this->Feedback->FeedbackSubject->find('list');
        $title = __('Submit Feedback');
        $this->set(compact('subjects', 'title'));
    }
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Feedback->recursive = 0;
        $this->set('feedback', $this->Paginator->paginate());
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
        if (!$this->Feedback->exists($id)) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        $options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
        $this->set('feedback', $this->Feedback->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Feedback->create();
            if ($this->Feedback->save($this->request->data)) {
                $this->Session->setFlash(__('The feedback has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The feedback could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }

        $subjects = $this->Feedback->FeedbackSubject->find('list');
        $this->set(compact('subjects'));
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
        if (!$this->Feedback->exists($id)) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Feedback']['id'] = intval($id);
            if ($this->Feedback->save($this->request->data)) {
                $this->Session->setFlash(__('The feedback has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The feedback could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
            $this->request->data = $this->Feedback->find('first', $options);
        }

        $subjects = $this->Feedback->FeedbackSubject->find('list');
        $this->set(compact('subjects'));
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
        $this->Feedback->id = $id;
        if (!$this->Feedback->exists()) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Feedback->delete()) {
            $this->Session->setFlash(__('The feedback has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The feedback could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}