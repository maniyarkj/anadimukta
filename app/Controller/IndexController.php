<?php

App::uses('AppController', 'Controller');

/**
 * Index Controller
 *
 */
class IndexController extends AppController
{
    private $_user = null;
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'sidebar', 'search');

        $this->loadModel('Prasang');
        $this->loadModel('Event');
        $this->loadModel('Quote');
        $this->loadModel('Tradition');
        $this->loadModel('Page');
        $this->_user = $this->Auth->user();
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->loadModel('Prasangrequest');
        $this->loadModel('Prasang');

        $newRequests = $this->Prasangrequest->find('count', array(
            'conditions' => array('Prasangrequest.status' => Prasangrequest::STATUS_CREATED),
        ));
        $writings = $this->Prasang->find('count', array(
            'conditions' => array('Prasang.status' => Prasang::STATUS_WRITING),
        ));
        $proofings = $this->Prasang->find('count', array(
            'conditions' => array('Prasang.status' => Prasang::STATUS_PROOFING),
        ));
        $published = $this->Prasang->find('count', array(
            'conditions' => array(
                'Prasang.status' => Prasang::STATUS_PUBLISHED,
                "Prasang.published_date <= '" . date('Y-m-d H:i:s') . "'",
            ),
        ));
        $this->set(compact('newRequests', 'writings', 'proofings', 'published'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->layout = 'bookra';

        // Featured Prasangs
        $featuredPrasangs = $this->Prasang->find('all', array(
            'conditions' => array(
                'Prasang.status' => Prasang::STATUS_PUBLISHED,
                'Prasang.is_featured' => 1,
                "Prasang.published_date <= '" . date('Y-m-d H:i:s') . "'",
            ),
            'order' => array('Prasang.published_date desc'),
            'limit' => 3,
        ));
        // Featured Events
        $featuredEvents = $this->Event->find('all', array(
            'conditions' => array(
                'Event.is_featured' => 1,
                'Event.is_visible' => 1,
            ),
            'order' => array('Event.modified desc'),
            'limit' => 5,
        ));
        // Featured Quotes
        $featuredQuotes = $this->Quote->find('all', array(
            'conditions' => array(
                'Quote.is_featured' => 1,
                'Quote.is_visible' => 1,
            ),
            'order' => array('Quote.modified desc'),
            'limit' => 20,
        ));

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

        $aboutUsPage = $this->Page->find('first', array(
            'conditions' => array('Page.id' => Page::PAGE_ABOUT_US),
        ));

        $this->set(compact('featuredPrasangs', 'featuredEvents', 'featuredQuotes', 'traditions',
                'aboutUsPage', 'withs', 'mainTradition'));
        $this->set('isLanding', true);
    }
    /**
     * index method
     *
     * @return void
     */
    public function blog()
    {
        $this->layout = 'bookra';

        $conditions = array(
            'Prasang.status' => Prasang::STATUS_PUBLISHED,
            "Prasang.published_date <= '" . date('Y-m-d H:i:s') . "'",
        );
        if ($this->_user && $this->_user['UserDetail']['user_type_id']) {
            $conditions[] = array("(PrasangUserType.user_type_id IS NULL OR PrasangUserType.user_type_id = "
                .  $this->_user['UserDetail']['user_type_id'] . ')');
        }
        else {
           $conditions[] = array('PrasangUserType.user_type_id IS NULL');
        }
        $this->Prasang->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'joins' => array(
                array(
                    'table' => 'prasangs_user_types',
                    'alias' => 'PrasangUserType',
                    'type' => 'LEFT',
                    'conditions' => array('PrasangUserType.prasang_id = Prasang.id'),
                )
            ),
            'group' => 'Prasang.id'
        );
        $this->set('prasangs', $this->Paginator->paginate('Prasang'));
    }

    public function sidebar()
    {
        $this->layout = 'bookra';
    }

    public function search()
    {
        $this->layout = 'bookra';

        $prasangs = $this->Prasang->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'MATCH(Prasang.content) AGAINST(?)' => $this->request->query['q'],
                    'MATCH(`Prasang`.`title`) AGAINST(?)' => $this->request->query['q']
                )
            )
        ));

        $this->set('prasangs', $prasangs);
    }

    public function easyshare()
    {
        $this->layout = null;

        require(APP . '/api/easyshare/index.php');

        exit;
    }
}