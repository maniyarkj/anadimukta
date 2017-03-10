<?php

App::uses('AppController', 'Controller');
App::uses('UploadHandler', 'Lib');
App::uses('BaseTextHelper', 'View/Helper');

/**
 * Prasangs Controller
 *
 * @property Prasang $Prasang
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PrasangsController extends AppController
{
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Search.Prg');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('view', 'sidebar', 'index', 'subject', 'with', 'section');

        $user = $this->Auth->user();
        $this->set('user', $user);
        $this->set('pageHeading', __('Prasangs'));
    }

    /**
     * Common function to get list of pransant for index
     *
     * @param type $status
     */
    protected function _list($status = null)
    {
        $this->set('statuses', $this->Prasang->getStatusOptions());
        $this->set('status', $status);
        $this->Prasang->recursive = 0;
        $condition = array();
        if ($status) {
            $condition['Prasang.status'] = $status;
        }
        $this->Paginator->settings = array(
            'conditions' => $condition,
        );
        $this->Prasang->recursive = 1;
        if ($this->request->query['subject_id']) {
            $this->Paginator->settings['conditions'] = array(
                "Subjects.id" => intval($this->request->query['subject_id']),
            );
            $this->Paginator->settings['joins'] = array(
                array(
                    'table' => 'prasangs_subjects',
                    'alias' => 'PrasangSubject',
                    'type' => 'LEFT',
                    'conditions' => array('PrasangSubject.prasang_id = Prasang.id'),
                ),
                array(
                    'table' => 'subjects',
                    'alias' => 'Subjects',
                    'type' => 'LEFT',
                    'conditions' => array('Subjects.id = PrasangSubject.subject_id'),
                ),
            );
        }
        return $this->Paginator->paginate();
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'bookra';

        $this->Prasang->recursive = 1;
        $this->set('prasangs', $this->Paginator->paginate());
        $this->set('title', __('Latest Prasangs'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function subject($subject = null)
    {
        $this->layout = 'bookra';
        $this->view = 'index';

        $this->Prasang->recursive = 1;
        $this->Paginator->settings = array();
        if ($subject) {
            $this->Paginator->settings['conditions'] = array("Subjects.id" => intval($subject));
            $this->Paginator->settings['joins'] = array(
                array(
                    'table' => 'prasangs_subjects',
                    'alias' => 'PrasangSubject',
                    'type' => 'LEFT',
                    'conditions' => array('PrasangSubject.prasang_id = Prasang.id'),
                ),
                array(
                    'table' => 'subjects',
                    'alias' => 'Subjects',
                    'type' => 'LEFT',
                    'conditions' => array('Subjects.id = PrasangSubject.subject_id'),
                ),
            );
        }
        $this->set('prasangs', $this->Paginator->paginate());
    }

    /**
     * index method
     *
     * @return void
     */
    public function with($with = null)
    {
        $this->layout = 'bookra';
        $this->view = 'index';

        $this->Prasang->recursive = 0;
        $this->Paginator->settings = array();
        if (intval($with)) {
            $this->Paginator->settings['conditions'] = array("With.id" => intval($with));
        }
        $this->set('prasangs', $this->Paginator->paginate());
    }

    /**
     * index method
     *
     * @return void
     */
    public function section($sectionId = null)
    {
        $this->layout = 'bookra';
        $this->view = 'index';

        // Fetch section details
        $this->loadModel('Section');
        $options = array('conditions' => array('Section.id' => $sectionId));
        $section = $this->Section->find('first', $options);

        $this->Prasang->recursive = 0;
        $this->Paginator->settings = array();
        if (intval($sectionId)) {
            $this->Paginator->settings['conditions'] = array("Section.id" => intval($sectionId));
        }
        $this->set('prasangs', $this->Paginator->paginate());
        $this->set('title', $section['Section']['name']);
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

        if (!$this->Prasang->exists($id)) {
            throw new NotFoundException(__('Invalid prasang'));
        }
        $prasang = $this->Prasang->find('first', array(
            'conditions' => array('Prasang.' . $this->Prasang->primaryKey => $id),
        ));
        $this->set('prasang', $prasang);

        // Set Meta
        $this->set('title', $prasang['Prasang']['title'] . ' | ' . 'Prasang');
        $baseTextHelper = new BaseTextHelper($this->_getViewObject());
        $this->set('metaDescription', $baseTextHelper->baseExcerpt($prasang['Prasang']['content'], 400));
        $this->set('metaAuthor', $prasang['With']['name']);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function sidebar($id = null)
    {
        $this->layout = 'bookra';

        if (empty($this->request->params['requested'])) {
            throw new ForbiddenException();
        }

        $latestPrasangs = $this->Prasang->find('all', array(
            'order' => array('Prasang.created desc'),
            'limit' => 5,
        ));
        $this->set('latestPrasangs', $latestPrasangs);

        $featuredSubjects = $this->Prasang->Subject->find('all', array(
            'conditions' => array('Subject.type' => Subject::TYPE_THIRD),
            'order' => array('Subject.created desc'),
            'limit' => 8,
        ));
        $this->set('featuredSubjects', $featuredSubjects);

        // Withs
        $withs = $this->Prasang->With->find('all', array(
            'conditions' => array(),
            'limit' => 6,
        ));
        $this->set('withs', $withs);

        // Section
        $sections = $this->Prasang->Section->find('all', array(
            'conditions' => array(),
            'limit' => 6,
        ));
        $this->set('sections', $sections);
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
        if (!$this->Prasang->exists($id)) {
            throw new NotFoundException(__('Invalid prasang'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Prasang->save($this->request->data)) {
                $this->Session->setFlash(__('The prasang has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The prasang could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Prasang.' . $this->Prasang->primaryKey => $id));
            $this->request->data = $this->Prasang->find('first', $options);
        }
        $sections = $this->Prasang->Section->find('list');
        $withs = $this->Prasang->With->find('list');
        $donorZones = $this->Prasang->DonorZone->find('list');
        $donorCenters = $this->Prasang->DonorCenter->find('list');
        $authors = $this->Prasang->Author->find('list');
        $dtpUsers = $this->Prasang->DtpUser->find('list');
        $publishedBies = $this->Prasang->PublishedBy->find('list');
        $subjects = $this->Prasang->Subject->find('list');
        $userTypes = $this->Prasang->UserType->find('list');
        $this->set(compact('sections', 'withs', 'donorZones', 'donorCenters', 'authors', 'dtpUsers',
                           'publishedBies', 'subjects', 'userTypes', 'id'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Prasang->id = $id;
        if (!$this->Prasang->exists()) {
            throw new NotFoundException(__('Invalid prasang'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Prasang->delete()) {
            $this->Session->setFlash(__('The prasang has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The prasang could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->set('pageHeading', __('All Prasangs'));
        $this->Prasang->recursive = 0;
        $this->set('prasangs', $this->_list());
    }

    /**
     * admin_index method
     *
     * Note: Just added to avoid multiple selection in admin menu
     *
     * @return void
     */
    public function admin_all()
    {
        $this->set('pageHeading', __('All Prasangs'));
        $this->Prasang->recursive = 0;
        $this->set('prasangs', $this->_list());
        $this->render('admin_index');
    }

    /**
     * List of new pransag list
     *
     * @return void
     */
    public function admin_uploaded()
    {
        $this->set('pageHeading', __('Uploaded Prasang'));
        $this->set('prasangs', $this->_list(Prasang::STATUS_UPLOADED));
    }

    /**
     * List of writing pransag list
     *
     * @return void
     */
    public function admin_writing()
    {
        $this->set('pageHeading', __('Prasangs in Writing'));
        $this->set('prasangs', $this->_list(Prasang::STATUS_WRITING));
        $this->render('admin_writing');
    }

    /**
     * List of discarded pransag list
     *
     * @return void
     */
    public function admin_discarded()
    {
        $this->set('pageHeading', __('Deleted/Discarded Prasangs'));
        $this->set('prasangs', $this->_list(Prasang::STATUS_DISCARDED));
        $this->render('admin_index');
    }

    /**
     * List of dtp pransag list
     *
     * @return void
     */
    public function admin_dtp()
    {
        $this->set('pageHeading', __('DTP Prasangs'));
        $this->set('prasangs', $this->_list(Prasang::STATUS_DTP));
        $this->render('admin_index');
    }

    /**
     * List of proof pransag list
     *
     * @return void
     */
    public function admin_proof()
    {
        $this->set('pageHeading', __('Prasangs for Proofing'));
        $this->set('prasangs', $this->_list(Prasang::STATUS_PROOFING));
        $this->render('admin_index');
    }

    /**
     * List of passed by slv pransag list
     *
     * @return void
     */
    public function admin_passedbyslv()
    {
        $this->set('pageHeading', __('Passed By SLV Prasangs'));
        $this->set('prasangs', $this->_list(Prasang::STATUS_PASSED_BY_SLV));
        $this->render('admin_index');
    }

    /**
     * List of approved pransag list
     *
     * @return void
     */
    public function admin_approved()
    {
        $this->set('pageHeading', __('Approved Prasangs'));
        $this->set('prasangs', $this->_list(Prasang::STATUS_APPROVED));
        $this->render('admin_index');
    }

    /**
     * List of approved pransag list
     *
     * @return void
     */
    public function admin_published()
    {
        $this->set('pageHeading', __('Published Prasangs'));
        $this->set('prasangs', $this->_list(Prasang::STATUS_PUBLISHED));
        $this->render('admin_index');
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

        $this->Prasang->recursive = 1;
        $condition = array(
            'Prasang.id IN ('. implode(',', $this->request->data['id']) . ')'
        );
        $prasangs = $this->Prasang->find('all', array(
            'conditions' => $condition,
        ));
        $this->set('prasangs', $prasangs);
        $this->render('admin_print');
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
        $this->layout = false;
        if (!$this->Prasang->exists($id)) {
            throw new NotFoundException(__('Invalid prasang'));
        }

        $options = array('conditions' => array('Prasang.' . $this->Prasang->primaryKey => $id));
        $prasang = $this->Prasang->find('first', $options);
        $this->set('prasang', $prasang);

        $user = $this->Auth->user();
        $statuses = array('' => __('Please Select'))
            + $this->Prasang->getStatusOptions($user, $prasang['Prasang']);

        $this->set('statuses', $statuses);
    }

    /**
     * Change prasang status
     *
     * @param int $id Pransang id
     * @return void
     * @throws NotFoundException
     */
    public function admin_status($id = null)
    {
        $this->layout = 'ajax';
        $this->response->type('json');
        if (!$this->Prasang->exists($id)) {
            throw new NotFoundException(__('Invalid prasang'));
        }

        $user = $this->Auth->user();
        $options = array('conditions' => array('Prasang.' . $this->Prasang->primaryKey => $id));
        $prasang = $this->Prasang->find('first', $options);
        $statuses = $this->Prasang->getStatusOptions($user, $prasang['Prasang']);
        $data = array();
        if (isset($this->request->data['Prasang'])) {
            $data = $this->request->data['Prasang'];
            $data['user_id'] = $user['id'];
        }
        if ($this->request->is('post')
                && array_key_exists($data['status'], $statuses)
                && $this->Prasang->changeStatus($id, $data, $prasang['Prasang'])) {
            $this->Session->setFlash(
                __('The prasang has been saved.'),
                'default',
                array('class' => 'alert alert-success')
            );
        }
        else {
            $this->Session->setFlash(
                __('The prasang could not be saved. Please, try again.'),
                'default',
                array('class' => 'alert alert-success')
            );
        }
        return $this->redirect($this->request->referer());
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        $placeholderOptions = array();
        if ($this->request->is('post')) {
            $this->Prasang->create();

//            $files = $this->request->data['Prasang']['files'];
//            $this->loadModel('Media');
//            $this->request->data['Media'] = $this->Media
//                    ->getMultiUploadedFileData($files);
            if ($this->Prasang->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The prasang has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect($this->request->referer());
            }
            else {
                $this->Session->setFlash(__('The prasang could not be saved. Please, try again.'),
                                            'default', array('class' => 'alert alert-danger'));
            }
        }
        $sections = $this->Prasang->Section->find('list');
        $withs = $this->Prasang->With->find('list');
        $donorZones = $this->Prasang->DonorZone->find('list');
        $donorCenters = $this->Prasang->DonorCenter->find('list');
        $authors = $this->Prasang->Author->find('list');
        $subjects = $this->Prasang->Subject->getSelectOptions();
        $userTypes = $this->Prasang->UserType->find('list');
        $grades = $this->Prasang->getGradeOptions();
        $statuses = $this->Prasang->getStatusOptions();
        $languages = $this->Prasang->getLanguageOptions();
        $medias = array();
        $this->set(compact('sections', 'withs', 'donorZones', 'donorCenters', 'authors',
                           'subjects', 'userTypes', 'grades', 'statuses', 'languages', 'medias', 'placeholderOptions'));
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
        if (!$this->Prasang->exists($id)) {
            throw new NotFoundException(__('Invalid prasang'));
        }
        $medias = array();
        $placeholderOptions = array();
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Prasang']['id'] = intval($id);
            if ($this->Prasang->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The prasang has been saved.'), 'default',
                                            array('class' => 'alert alert-success'));
                return $this->redirect($this->request->referer());
            }
            else {
                $this->Session->setFlash(__('The prasang could not be saved. Please, try again.'),
                                            'default');
            }
        }
        else {
            $options = array('conditions' => array('Prasang.' . $this->Prasang->primaryKey => $id));
            $this->request->data = $this->Prasang->find('first', $options);

            // Set the translation text
//            $this->request->data['Prasang']['content'] = array();
//            foreach ($this->request->data['contentTranslation'] as $content) {
//                $this->request->data['Prasang']['content'][$content['locale']] = $content['content'];
//            }
            $medias = $this->request->data['Media'];

            // Prepare Media placeholders
            $placeholderOptions = $this->Prasang->Media->getPlaceholderOptions($medias);
        }

        $sections = $this->Prasang->Section->find('list');
        $withs = $this->Prasang->With->find('list');
        $donorZones = $this->Prasang->DonorZone->find('list');
        $donorCenters = $this->Prasang->DonorCenter->find('list');
        $authors = $this->Prasang->Author->find('list');
        $subjects = $this->Prasang->Subject->getSelectOptions();
        $userTypes = $this->Prasang->UserType->find('list');
        $grades = $this->Prasang->getGradeOptions();
        $statuses = $this->Prasang->getStatusOptions();
        $languages = $this->Prasang->getLanguageOptions();

        $this->set(compact('sections', 'withs', 'donorZones', 'donorCenters', 'authors',
                'subjects', 'userTypes', 'grades', 'statuses', 'languages', 'medias', 'id', 'placeholderOptions'));
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
        $this->Prasang->id = $id;
        if (!$this->Prasang->exists()) {
            throw new NotFoundException(__('Invalid prasang'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Prasang->delete()) {
            $this->Session->setFlash(__('The prasang has been deleted.'), 'default',
                                        array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The prasang could not be deleted. Please, try again.'),
                                        'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_upload()
    {
        $upload_handler = new UploadHandler();
        exit;
    }
}