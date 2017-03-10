<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="pageContent">
    <div class="page-title error">
        <div class="container">

            <h2><?php echo $message; ?></h2>
            <p><?php echo __d('cake', 'Error'); ?>: <?php
                printf(
                        __d('cake', 'The requested address %s was not found on this server.'),
                        "<strong>'{$url}'</strong>"
                );
                ?></p>
            <p>
                <span class="goback btn btn-primary" onclick="goBack();">Go back!</span>
                <a href="/" class="btn btn-primary">Home</a>
            </p>
        </div>
    </div>
    <div class="container">
        <?php
        if (Configure::read('debug') > 0):
            echo $this->element('exception_stack_trace');
        endif;
        ?>
    </div>
</div>