<?php

App::uses('AppController', 'Controller');

/**
 * Subjects Controller
 *
 * @property Subject $Subject
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SubjectsController extends AppController
{
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Search.Prg');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Subject->recursive = -1;
        $this->Subject->virtualFields = array(
            'sortOrder' => 'COALESCE(Subject.main_id, Subject.id)',
            'sortOrder2' => 'COALESCE(Subject.secondary_id, Subject.id)',
        );
        $this->Prg->commonProcess();
        $this->Paginator->settings = array(
            'order' => array(
                'Subject__sortOrder' => 'asc',
                'Subject__sortOrder2' => 'asc',
                'secondary_id' => 'asc',
            ),
            'conditions' => $this->Subject->parseCriteria($this->Prg->parsedParams()),
        );

        $this->set('subjects', $this->Paginator->paginate('Subject', array(), array(
            'Subject__sortOrder',
            'Subject__sortOrder2',
            'secondary_id',
        )));

        $types = $this->Subject->getSubjectTypeOptions();
        $this->set('types', $types);
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
        if (!$this->Subject->exists($id)) {
            throw new NotFoundException(__('Invalid subject'));
        }
        $options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
        $this->set('subject', $this->Subject->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        $this->loadModel('Subject');
        if ($this->request->is('post')) {
            $this->Subject->create();
            if ($this->Subject->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The subject has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The subject could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
        $named = $this->request->named;
        $main_id = isset($named['main_id']) ? $named['main_id'] : '';
        $secondary_id = isset($named['secondary_id']) ? $named['secondary_id'] : '';
        $type = isset($named['type']) ? $named['type'] : '';

        $types = $this->Subject->getSubjectTypeOptions();
        $mains = $this->Subject->Main->find('list');
        $secondary = $this->Subject->Secondary->find('list');
        $this->set(compact('mains', 'secondary', 'types', 'type', 'main_id', 'secondary_id'));
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
        $this->loadModel('Subject');
        if (!$this->Subject->exists($id)) {
            throw new NotFoundException(__('Invalid subject'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Subject']['id'] = intval($id);
            if ($this->Subject->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The subject has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The subject could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
            $this->request->data = $this->Subject->find('first', $options);
        }
        $named = $this->request->named;
        $main_id = isset($named['main_id']) ? $named['main_id'] : '';
        $secondary_id = isset($named['secondary_id']) ? $named['secondary_id'] : '';
        $type = isset($named['type']) ? $named['type'] : '';

        $types = $this->Subject->getSubjectTypeOptions();
        $mains = $this->Subject->Main->find('list');
        $secondary = $this->Subject->Secondary->find('list');
        $this->set(compact('mains', 'secondary', 'types', 'type', 'main_id', 'secondary_id'));
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
        $this->Subject->id = $id;
        if (!$this->Subject->exists()) {
            throw new NotFoundException(__('Invalid subject'));
        }
        if ($this->Subject->delete()) {
            $this->Session->setFlash(__('The subject has been deleted.'), 'default',
                    array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The subject could not be deleted. '
                    . 'Subject with no child and not assigned to any Prasang only allowed to delete.'),
                    'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getByType()
    {
        $this->layout = 'ajax';
        $type = $this->request->data['type'];
        $value = isset($this->request->data['main_id'])
                ? $this->request->data['main_id']
                : '';
        $conditions = array('Subject.type'=> $type);
        // If we are feching secondary subject then fetch only subject of selected main subject
        if ($type == 2) {
            $conditions['Subject.main_id'] = $this->request->data['main_id'];
            $value = isset($this->request->data['secondary_id'])
                ? $this->request->data['secondary_id']
                : '';
        }
        $subjects = $this->Subject->find('list', array(
            'conditions' => $conditions,
            'recursive' => -1
        ));
        $this->set(compact('subjects', 'value'));
    }
}