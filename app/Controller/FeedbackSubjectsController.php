<?php

App::uses('AppController', 'Controller');

/**
 * FeedbackSubjects Controller
 *
 * @property FeedbackSubject $FeedbackSubject
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FeedbackSubjectsController extends AppController
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
        $this->FeedbackSubject->recursive = 0;
        $this->set('feedbackSubjects', $this->Paginator->paginate());
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
        if (!$this->FeedbackSubject->exists($id)) {
            throw new NotFoundException(__('Invalid feedback subject'));
        }
        $options = array('conditions' => array('FeedbackSubject.' . $this->FeedbackSubject->primaryKey => $id));
        $this->set('feedbackSubject', $this->FeedbackSubject->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->FeedbackSubject->create();
            if ($this->FeedbackSubject->save($this->request->data)) {
                $this->Session->setFlash(__('The feedback subject has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The feedback subject could not be saved. Please, try again.'),
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
        if (!$this->FeedbackSubject->exists($id)) {
            throw new NotFoundException(__('Invalid feedback subject'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->FeedbackSubject->save($this->request->data)) {
                $this->Session->setFlash(__('The feedback subject has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The feedback subject could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('FeedbackSubject.' . $this->FeedbackSubject->primaryKey => $id));
            $this->request->data = $this->FeedbackSubject->find('first', $options);
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
        $this->FeedbackSubject->id = $id;
        if (!$this->FeedbackSubject->exists()) {
            throw new NotFoundException(__('Invalid feedback subject'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->FeedbackSubject->delete()) {
            $this->Session->setFlash(__('The feedback subject has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The feedback subject could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}