<?php
$navigation = array(
    array(
        'name' => 'Dashboard',
        'controller' => 'index',
        'action' => 'admin_index',
        'icon' => 'dashboard',
    ),
    array(
        'name' => 'Requests',
        'controller' => 'prasangrequests',
        'action' => 'admin_index',
        'icon' => 'table',
    ),
    array(
        'name' => 'Prasang',
        'controller' => 'prasangs',
        'action' => 'admin_index',
        'icon' => 'table',
        'target' => 'prasangs',
        'pages' => array(
            array(
                'name' => 'All Prasangs',
                'controller' => 'prasangs',
                'action' => 'admin_all',
                'icon' => 'table',
            ),
            array(
                'name' => 'Writing',
                'controller' => 'prasangs',
                'action' => 'admin_writing',
                'icon' => 'table',
            ),
            array(
                'name' => 'Discarded',
                'controller' => 'prasangs',
                'action' => 'admin_discarded',
                'icon' => 'table',
            ),
            array(
                'name' => 'DTP',
                'controller' => 'prasangs',
                'action' => 'admin_dtp',
                'icon' => 'table',
            ),
            array(
                'name' => 'Proofing',
                'controller' => 'prasangs',
                'action' => 'admin_proof',
                'icon' => 'table',
            ),
            array(
                'name' => 'Passed By SLV',
                'controller' => 'prasangs',
                'action' => 'admin_passedbyslv',
                'icon' => 'table',
            ),
            array(
                'name' => 'Approved',
                'controller' => 'prasangs',
                'action' => 'admin_approved',
                'icon' => 'table',
            ),
            array(
                'name' => 'Published',
                'controller' => 'prasangs',
                'action' => 'admin_published',
                'icon' => 'table',
            ),
        ),
    ),
    array(
        'name' => 'References',
        'icon' => 'table',
        'target' => 'references',
        'controller' => 'references',
        'action' => 'admin_index',
        'pages' => array(
            array(
                'name' => 'View All',
                'controller' => 'references',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Add',
                'controller' => 'references',
                'action' => 'admin_add',
                'icon' => 'edit',
            ),
        ),
    ),
    array(
        'name' => 'Users',
        'controller' => 'users',
        'action' => 'admin_index',
        'icon' => 'table',
        'target' => 'users',
        'pages' => array(
            array(
                'name' => 'Admin Users',
                'controller' => 'users',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Front Users',
                'controller' => 'userdetails',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
        ),
    ),
    array(
        'name' => 'Feedback',
        'controller' => 'feedbacks',
        'action' => 'admin_index',
        'icon' => 'table',
    ),
    array(
        'name' => 'Upcoming Events/Visits',
        'controller' => 'events',
        'action' => 'admin_index',
        'icon' => 'table',
    ),
    array(
        'name' => 'Quotes',
        'controller' => 'quotes',
        'action' => 'admin_index',
        'icon' => 'table',
    ),
    array(
        'name' => 'Spiritual Succession',
        'controller' => 'traditions',
        'action' => 'admin_index',
        'icon' => 'table',
    ),
    array(
        'name' => 'Pages',
        'controller' => 'pages',
        'action' => 'admin_index',
        'icon' => 'table',
    ),
    array(
        'name' => 'Masters',
        'target' => 'masters',
        'icon' => 'table',
        'pages' => array(
// Note: Deprecated, Check UserDetails::TYPE_*
//            array(
//                'name' => 'User Display Types',
//                'controller' => 'userTypes',
//                'action' => 'admin_index',
//                'icon' => 'table',
//            ),
            array(
                'name' => 'Sections',
                'controller' => 'sections',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Subjects',
                'controller' => 'subjects',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Authors',
                'controller' => 'authors',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Reference Types',
                'controller' => 'refernecetypes',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Feedback Subjects',
                'controller' => 'feedbackSubjects',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Zones',
                'controller' => 'zones',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Centers',
                'controller' => 'centers',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Countries',
                'controller' => 'countries',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'States',
                'controller' => 'states',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Districts',
                'controller' => 'districts',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Talukas',
                'controller' => 'talukas',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Cities',
                'controller' => 'cities',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
            array(
                'name' => 'Withs',
                'controller' => 'withs',
                'action' => 'admin_index',
                'icon' => 'table',
            ),
// Note: We don't use this module as of now.
//            array(
//                'name' => 'Media',
//                'controller' => 'media',
//                'action' => 'admin_index',
//                'icon' => 'table',
//            ),
        ),
    ),
);
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">SMVS (Swaminarayan Mandir Vasna Sanstha)</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $Auth->user('username'); ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <?php
                    echo $this->Html->link(
                        '<i class="fa fa-fw fa-power-off"></i> Log Out',
                        array(
                            'controller' => 'users',
                            'action' => 'logout',
                            'admin' => false,
                        ),
                        array('escape' => false)
                    );
                    ?>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <?php
            foreach ($navigation as $nav) {
                if ($nav['name'] == 'Masters' || $Acl->check(array(
                            'model' => 'Group',
                            'foreign_key' => $Auth->user('group_id'),
                                ), $nav['controller'] . '/' . $nav['action'])) {
                    echo '<li>';
                    if (!isset($nav['pages'])) {
                        echo $this->Html->link(
                            '<i class="fa fa-fw fa-' . $nav['icon'] . '"></i> ' . $nav['name'],
                            array(
                                'controller' => $nav['controller'],
                                'action' => $nav['action'],
                                'admin' => true,
                                'plugin' => false,
                            ),
                            array('class' => '', 'escape' => false)
                        );
                    }
                    else {
                        echo $this->Html->link(
                            '<i class="fa fa-fw fa-' . $nav['icon'] . '"></i> ' . $nav['name'] . ' <span class="fa arrow"></span>',
                            '#',
                            array('escape' => false)
                        );
                        echo '<ul id="' . $nav['target'] . '" class="nav nav-second-level">';
                        foreach ($nav['pages'] as $page) {
                            if ($Acl->check(array(
                                    'model' => 'Group',
                                    'foreign_key' => $Auth->user('group_id'),
                                        ), $page['controller'] . '/' . $page['action'])) {
                                $isActive = '';
                                if ($page['controller'] == 'prasangs'
                                        && $page['action'] == 'admin_uploaded') {
                                    $isActive = 'active';
                                }
                                echo sprintf('<li class="%s">', $isActive)
                                . $this->Html->link(
                                    '<i class="fa fa-fw fa-' . $page['icon'] . '"></i> ' . $page['name'],
                                    array(
                                        'controller' => $page['controller'],
                                        'action' => $page['action'],
                                        'admin' => true,
                                        'plugin' => false,
                                    ), array('escape' => false)
                                )
                                . '</li>';
                            }
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                }
            }
            if ($Acl->check(array(
                        'model' => 'Group',
                        'foreign_key' => $Auth->user('group_id'),
                    ), 'aros/admin_ajax_role_permissions')) {
                echo '<li>';
                echo $this->Html->link(
                    '<i class="fa fa-fw fa-lock"></i> Permissions',
                    '/admin/acl/aros/ajax_role_permissions',
                    array('class' => '', 'escape' => false)
                );
                echo '</li>';
            }
            ?>
        </ul>
            </div>
    </div>
    <!-- /.navbar-collapse -->
</nav>