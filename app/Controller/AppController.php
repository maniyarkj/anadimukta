<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('Page', 'Model');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Layout
     *
     * @var string
     */
    public $layout = 'admin';
    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
        'Paginator',
    );
    public $helpers = array('Html', 'Form', 'Session', 'Js', 'BaseText', 'BaseForm');

    public function beforeFilter()
    {
        $isAdmin = !empty($this->params['admin']);
        Configure::write('Routing.isAdmin', $isAdmin);

        $this->loadModel('User');
        $this->loadModel('Role');
        $this->loadModel('Section');
        $this->loadModel('Page');

        //Configure AuthComponent
        $this->Auth->loginAction = "/users/login";
        $this->Auth->logoutRedirect = array(
            'controller' => 'users',
            'action' => 'login',
            $this->request->prefix => false
        );
        $this->Auth->loginRedirect = array(
            'controller' => 'index',
            'action' => 'index',
            'admin' => false,
        );
        // Uncomment below to allow all
        //$this->Auth->allow();

        $this->Auth->allow(
            'getByCountry',
            'getByCountryState',
            'getByCountryStateDistrict',
            'register',
            'login',
            'logout',
            'check_username'
        );

        $this->set('Auth', $this->Auth);
        $this->set('Acl', $this->Acl);

        // Backend user always have english language
        if (User::isBackendUser($this->Auth->user())) {
            $this->Session->write('Config.language', 'eng');
        }
        else {
            $this->Session->write('Config.language', Configure::read('Config.language'));
        }

        $this->set('availableLanguages', Configure::read('Config.availableLanguages'));

        // Not used
        // $this->_setNavigation();

        //checking the browsers language when there's no language session
        //$this->_checkBrowserLanguage();

        Configure::write('App.imageBaseUrl','/template/assets/images/');

        // Load some data in view for front website
        if (!Configure::read('Routing.isAdmin')) {
            $this->_loadFrontDataInView();
        }
    }

    /**
     * Load some common data in view for front end website
     *
     * @return void
     */
    protected function _loadFrontDataInView()
    {
        // Set sections data to display in navigation
        $this->Section->formatTranslation = true;
        $sections = $this->Section->find('all', array(
            'recursive' => 1,
            'order' => array('Section.sortorder' => 'asc'),
        ));
        $this->set('sections', $sections);

        // Set location => page Id, this sets various pages links on website
        $pages = $this->Page->find('all', array('recursive' => -1));
        $locationPages = array();
        foreach ($pages as $page) {
            if (!$page['Page']['location']) {
                continue;
            }
            $locationPages[$page['Page']['location']] = $page;
        }
        $this->set('locationPages', $locationPages);
    }

    protected function _setNavigation()
    {
        // Prepare navigation array
        $mainControllers = array(
            'prasangs' => array(
                'title' => 'Prasangs'
            ),
            'references' => array(
                'title' => 'References'
            ),
            'users' => array(
                'title' => 'Users'
            ),
            'feedbacks' => array(
                'title' => 'Feedback'
            ),
            'masters' => array(
                'title' => 'Masters',
                'submenu' => array(
                    'userTypes' => array(
                        'title' => 'User Display Types'
                    ),
                    'sections' => array(
                        'title' => 'Sections'
                    ),
                    'subjects' => array(
                        'title' => 'Subjects'
                    ),
                    'authors' => array(
                        'title' => 'Authors'
                    ),
                    'refernecetypes' => array(
                        'title' => 'Reference Types'
                    ),
                    'feedbackSubjects' => array(
                        'title' => 'Feedback Subjects'
                    ),
                    'zones' => array(
                        'title' => 'Zones'
                    ),
                    'centers' => array(
                        'title' => 'Centers'
                    ),
                    'countries' => array(
                        'title' => 'Countries'
                    ),
                    'states' => array(
                        'title' => 'States'
                    ),
                    'districts' => array(
                        'title' => 'Districts'
                    ),
                    'talukas' => array(
                        'title' => 'Talukas'
                    ),
                    'cities' => array(
                        'title' => 'Cities'
                    ),
                ),
            ),
        );
        $backend_nav = array();
        if ($this->Session->read('Auth.User.group_id')) {
            foreach ($mainControllers as $key => $controller) {
                if ($key == 'masters') {
                    $menu = array(
                        'title' => $controller['title'],
                        'url' => '#',
                        'submenu' => array(),
                    );
                    foreach ($controller['submenu'] as $mkey => $master) {
                        $hasAccess = $this->Acl->check(
                            array(
                                'model' => 'Group',
                                'foreign_key' => $this->Session->read('Auth.User.group_id')
                            ),
                            $mkey . '/admin_index'
                        );
                        if ($hasAccess) {
                            $menu['submenu'][] = array(
                                'title' => $master['title'],
                                'url' => '/admin/' . $mkey,
                                // Note: Currently submenu is not used for masters.
                                'submenu' => array(
                                    array(
                                        'title' => 'View All',
                                        'url' => '/admin/' . $mkey,
                                    ),
                                    array(
                                        'title' => 'Add New',
                                        'url' => '/admin/' . $mkey . '/add',
                                    )
                                )
                            );
                        }
                    }
                    $backend_nav[] = $menu;
                }
                else {
                    $hasAccess = $this->Acl->check(array(
                        'model' => 'Group',
                        'foreign_key' => $this->Session->read('Auth.User.group_id')
                            ), $key . '/admin_index'
                    );
                    if ($hasAccess) {
                        $backend_nav[] = array(
                            'title' => $controller['title'],
                            'url' => '/admin/' . $key,
                            'submenu' => array(
                                array(
                                    'title' => 'View All',
                                    'url' => '/admin/' . $key,
                                ),
                                array(
                                    'title' => 'Add New',
                                    'url' => '/admin/' . $key . '/add',
                                )
                            )
                        );
                    }
                    // Add Role permission menu item if user has access to it
                    if ($key == 'users') {
                        $canChangeRolePermission = $this->Acl->check(
                            array(
                                'model' => 'Group',
                                'foreign_key' => $this->Session->read('Auth.User.group_id')
                            ),
                            'aros/admin_grant_role_permission'
                        );
                        if ($canChangeRolePermission) {
                            $backend_nav[count($backend_nav) - 1]['submenu'][] = array(
                                'title' => 'Role Permissions',
                                'url' => '/admin/acl/aros/ajax_role_permissions',
                            );
                        }
                    }
                }
            }
        }
        $this->set(compact('backend_nav'));
    }

    public function redirect($url, $status = null, $exit = true)
    {
        if ($this->request->is('ajax')) {
            parent::redirect(null, $status, false);
            $this->response->body(json_encode(array(
                'status' => $status,
                'message' => $this->message,
            )));
            $this->response->send();
            $this->_stop();
        }
        else {
            parent::redirect($url, $status, $exit);
        }
    }

    private function ajaxResponse()
    {
        $this->autoRender = false;

        if (is_array($status)) {
                extract($status, EXTR_OVERWRITE);
        }
        $event = new CakeEvent('Controller.beforeRedirect', $this, array($url, $status, $exit));

        list($event->break, $event->breakOn, $event->collectReturn) = array(true, false, true);
        $this->getEventManager()->dispatch($event);

        if ($event->isStopped()) {
                return;
        }
        $response = $event->result;
        extract($this->_parseBeforeRedirect($response, $url, $status, $exit), EXTR_OVERWRITE);

        if ($url !== null) {
                $this->response->header('Location', Router::url($url, true));
        }

        if (is_string($status)) {
            $codes = array_flip($this->response->httpCodes());
            if (isset($codes[$status])) {
                $status = $codes[$status];
            }
        }

        if ($status === null) {
            $status = 302;
        }
        $this->response->statusCode($status);

        if ($exit) {
            $this->response->send();
            $this->_stop();
        }
    }

    private function changeLanguage($lang)
    {
        if (!empty($lang)){
            if ($lang == 'hin'){
                $this->Session->write('Config.language', 'hin');
            }
            elseif ($lang == 'guj'){
                $this->Session->write('Config.language', 'guj');
            }
            else {
                $this->Session->write('Config.language', 'eng');
            }

            //in order to redirect the user to the page from which it was called
            $this->redirect($this->referer());
        }
    }

    //in AppController.php
    /**
     * Read the browser language and sets the website language to it if available.
     *
     * @see http://alvarotrigo.com/blog/implementing-multilanguage-in-cakephp-2-x/
     */
    protected function _checkBrowserLanguage()
    {
        if(!$this->Session->check('Config.language')){

            //checking the 1st favorite language of the user's browser
            $browserLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

            //available languages
            switch ($browserLanguage){
                case "hi":
                    $this->Session->write('Config.language', 'hin');
                    break;
                case "guj":
                    $this->Session->write('Config.language', 'guj');
                    break;
                default:
                    $this->Session->write('Config.language', 'eng');
            }
        }
    }

    protected function _getViewObject()
    {
        return parent::_getViewObject();
    }
}