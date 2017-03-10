<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="deleteProductModalLabel"><?php echo __('New Prasang'); ?></h4>
        </div>
        <div class="modal-body">
            <table cellpadding="0" cellspacing="0" class="table">
                <tbody>
                    <tr>
                        <th><?php echo __('Title'); ?></th>
                        <td>
                            <?php echo h($prasang['Prasang']['title']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Grade'); ?></th>
                        <td>
                            <?php echo h($prasang['Prasang']['grade']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Place'); ?></th>
                        <td>
                            <?php echo h($prasang['Prasang']['place']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Author'); ?></th>
                        <td>
                            <?php
                            echo $this->Html->link($prasang['Author']['name'],
                                    array('controller' => 'authors', 'action' => 'view', $prasang['Author']['id']));
                            ?>
                            &nbsp;
                        </td>
                    </tr>                    
                </tbody>
            </table>
            <?php echo $this->element('prasangs/form_moveto'); ?>
        </div>
        <div class="modal-footer">
            <!--                <button type="button" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>-->
        </div>
    </div>
</div>


