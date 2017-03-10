<?php

App::uses('AppController', 'Controller');

/**
 * Media Controller
 *
 * @property Media $Media
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MediasController extends AppController
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
        
        $named = $this->request->params['named'];
        
        if (!$named['prasang']) {
            throw new NotFoundException(__('Invalid Request'));
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $named = $this->request->params['named'];
        if ($this->request->is('post')) {
            $this->request->data['prasang_id'] = $named['prasang'];
            if ($this->Media->saveUploadedFile('file', $this->request->data)) {
                $this->Session->setFlash(__('The media has been saved.'), 'default',
                        array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index', 'prasang' => $named['prasang']));
            }
            else {
                $this->Session->setFlash(__('The media could not be saved. Please, try again.'),
                        'default', array('class' => 'alert alert-danger'));
            }
        }
        
        $this->Media->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array('Prasang.id' => $named['prasang']),
        );
        $this->set('media', $this->Paginator->paginate());
        $this->set('prasangId', $named['prasang']);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_grid()
    {
        $this->Media->recursive = 0;
        $this->set('media', $this->Paginator->paginate());
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
        if (!$this->Media->exists($id)) {
            throw new NotFoundException(__('Invalid media'));
        }
        $options = array('conditions' => array('Media.' . $this->Media->primaryKey => $id));
        $this->set('media', $this->Media->find('first', $options));
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
        $this->Media->id = $id;
        if (!$this->Media->exists()) {
            throw new NotFoundException(__('Invalid media'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Media->delete()) {
            $this->Session->setFlash(__('The media has been deleted.'), 'default',
                    array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The media could not be deleted. Please, try again.'),
                    'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index', 'prasang' => $this->request->params['named']['prasang']));
    }
}