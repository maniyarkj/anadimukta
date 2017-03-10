<?php

App::uses('AppController', 'Controller');

/**
 * Prasangrequests Controller
 *
 * @property Prasangrequest $Prasangrequest
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PrasangrequestsController extends AppController
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
        $this->Auth->allow('submit','submit_success');

        $this->loadModel('Prasang');
    }

    /**
     * index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Prasangrequest->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('Prasangrequest.status' => Prasangrequest::STATUS_CREATED)
        );
        $this->set('prasangrequests', $this->Paginator->paginate());
        $this->set('statuses', $this->Prasangrequest->getStatusOptions());
    }

    /**
     * print
     *
     * @return void
     */
    public function admin_print()
    {
        $this->layout = null;
        $this->set('statuses', $this->Prasang->getStatusOptions());
        $ids = $this->request->data['id'];
        if (empty($ids)) {
            $this->Session->setFlash(
                __('Please select request to print.'),
                'default',
                array('class' => 'alert alert-danger')
            );
            return $this->redirect($this->request->referer());
        }

        $this->Prasangrequest->recursive = 1;
        $condition = array(
            'Prasangrequest.id IN ('. implode(',', $this->request->data['id']) . ')'
        );
        $prasangs = $this->Prasangrequest->find('all', array(
            'conditions' => $condition,
        ));
        $this->set('prasangs', $prasangs);
        $this->render('admin_print');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null)
    {
        if (!$this->Prasangrequest->exists($id)) {
            throw new NotFoundException(__('Invalid prasangrequest'));
        }
        $options = array('conditions' => array('Prasangrequest.' . $this->Prasangrequest->primaryKey => $id));
        $this->set('prasangrequest', $this->Prasangrequest->find('first', $options));
        $this->set('statuses', $this->Prasangrequest->getStatusOptions());
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        $this->layout = 'front';
        if ($this->request->is('post')) {
            $this->Prasangrequest->create();
            if ($this->Prasangrequest->save($this->request->data)) {
                $this->Session->setFlash(__('The prasangrequest has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The prasangrequest could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function submit()
    {
        $this->layout = 'bookra';
        if ($this->request->is('post')) {
            $this->Prasangrequest->create();
            $this->request->data['Prasangrequest']['is_personal'] = 0;
            if ($this->Prasangrequest->save($this->request->data)) {
                return $this->redirect(array('action' => 'submit_success'));
            }
            else {
                $this->Session->setFlash(__('The prasang could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $sections = $this->Prasangrequest->Section->find('list');
        $withs = $this->Prasangrequest->With->find('list');
        $donorZones = $this->Prasangrequest->DonorZone->find('list');
        $donorCenters = $this->Prasangrequest->DonorCenter->find('list');
        $languages = $this->Prasang->getLanguageOptions();
        $title = __('Submit Prasang');
        $this->set(compact(
                'sections',
                'withs',
                'donorZones',
                'donorCenters',
                'languages',
                'title'
            ));
    }

    /**
     * Success page after front prasang submitted
     */
    public function submit_success()
    {
        $this->layout = 'bookra';
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Prasangrequest->exists($id)) {
            throw new NotFoundException(__('Invalid prasangrequest'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Prasangrequest->save($this->request->data)) {
                $this->Session->setFlash(__('The prasangrequest has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The prasangrequest could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Prasangrequest.' . $this->Prasangrequest->primaryKey => $id));
            $this->request->data = $this->Prasangrequest->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->Prasangrequest->id = $id;
        if (!$this->Prasangrequest->exists()) {
            throw new NotFoundException(__('Invalid prasangrequest'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Prasangrequest->delete()) {
            $this->Session->setFlash(__('The prasangrequest has been deleted.'), 'default',
                    array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The prasangrequest could not be deleted. Please, try again.'),
                    'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * discard method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_discard($id = null)
    {
        $this->Prasangrequest->id = $id;
        if (!$this->Prasangrequest->exists()) {
            throw new NotFoundException(__('Invalid prasangrequest'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->Prasangrequest->read(null, $id);
        $this->Prasangrequest->set('status', Prasangrequest::STATUS_DISCARDED);
        if ($this->Prasangrequest->save()) {
            $this->Session->setFlash(__('The prasangrequest has been discarded.'), 'default',
                    array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The prasangrequest could not be discarded. Please, try again.'),
                    'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Accept method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_accept($id = null)
    {
        $ids = $this->request->data['id'];
        if (empty($ids)) {
            $this->Session->setFlash(
                __('Please select atleast a request.'),
                'default',
                array('class' => 'alert alert-danger')
            );
            return $this->redirect($this->request->referer());
        }
        $this->request->onlyAllow('post');
        $this->loadModel('Prasang');
        $success = 0;
        $failure = 0;
        foreach ($ids as $id) {
            $this->Prasangrequest->id = $id;
            if (!$this->Prasangrequest->exists()) {
                continue;
            }
            $this->Prasangrequest->recursive = -1;
            $this->Prasangrequest->read(null, $id);
            $this->Prasang->data = $this->Prasangrequest->data;
            $this->Prasang->data['Prasang'] = $this->Prasangrequest->data['Prasangrequest'];
            unset($this->Prasang->data['Prasangrequest']);
            unset($this->Prasang->data['Prasang']['id']);
            $this->Prasang->data['Prasang']['status'] = Prasang::STATUS_WRITING;
            $this->Prasang->data['Prasang']['prasangrequest_id'] = $id;
            $this->Prasang->data['Prasangrequest'] = $this->Prasangrequest->data['Prasangrequest'];
            $this->Prasang->data['Prasangrequest']['status'] = Prasangrequest::STATUS_ACCEPTED;
            if ($this->Prasang->saveAssociated(null, array('validate' => false))) {
                $success++;
            }
            else {
                $failure++;
            }
        }
        if ($success && $failure) {
            $this->Session->setFlash(
                __('%s request(s) has been accepted for writing and %s requests failed', $success, $failure),
                'default',
                array('class' => 'alert alert-success')
            );
        }
        else if ($success) {
            $this->Session->setFlash(
                __('%s request(s) has been accepted for writing', $success),
                'default',
                array('class' => 'alert alert-success')
            );
        }
        else {
            $this->Session->setFlash(
                __('%s requests failed. Please, try again.', $failure),
                'default',
                array('class' => 'alert alert-danger')
            );
        }
        return $this->redirect(array('action' => 'index'));
    }

}