<div class="prasangs form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Admin Add Prasang'); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">

                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Prasangs'),
                                        array('action' => 'index'), array('escape' => false));
                                ?></li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Sections'),
                                        array('controller' => 'sections', 'action' => 'index'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Section'),
                                        array('controller' => 'sections', 'action' => 'add'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Withs'),
                                        array('controller' => 'withs', 'action' => 'index'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New With'),
                                        array('controller' => 'withs', 'action' => 'add'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Zones'),
                                        array('controller' => 'zones', 'action' => 'index'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Donor Zone'),
                                        array('controller' => 'zones', 'action' => 'add'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Centers'),
                                        array('controller' => 'centers', 'action' => 'index'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Donor Center'),
                                        array('controller' => 'centers', 'action' => 'add'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Authors'),
                                        array('controller' => 'authors', 'action' => 'index'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Author'),
                                        array('controller' => 'authors', 'action' => 'add'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'),
                                        array('controller' => 'users', 'action' => 'index'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Dtp User'),
                                        array('controller' => 'users', 'action' => 'add'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Subjects'),
                                        array('controller' => 'subjects', 'action' => 'index'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Subject'),
                                        array('controller' => 'subjects', 'action' => 'add'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List User Types'),
                                        array('controller' => 'user_types', 'action' => 'index'),
                                        array('escape' => false));
                                ?> </li>
                            <li><?php
                                echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User Type'),
                                        array('controller' => 'user_types', 'action' => 'add'),
                                        array('escape' => false));
                                ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#prasangForm"
                       aria-controls="prasangForm"
                       role="tab"
                       data-toggle="tab"
                       data-hasSave="1"
                    >
                        Prasang
                    </a>
                </li>
                <li role="presentation">
                    <a href="#prasangMedia" aria-controls="prasangMedia" role="tab" data-toggle="tab">
                        Media
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="prasangForm">
                    <?php echo $this->element('prasangs/form_prasang'); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="prasangMedia">
                    <p>Media Listing will come here...</p>
                </div>
            </div>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
<script>
$('document').ready(function(){
    $('a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
        debugger;
    });
    $('.nav-tabs li').each(function (index, element) {
        console.log(element);
        this.hasSave = $(element.children[0]).attr('data-hasSave');
        this.target = $($(element.children[0]).attr('href'));
        this.form = null;

        if (this.hasSave) {
            this.form = $('form', this.target);
            this.data = this.form.serialize();
            debugger;
            $('[href='+$(element.children[0]).attr('href')+']').on('hide.bs.tab', function (e) {
                e.preventDefault();
                e.stopPropagation()
                debugger;
//                e.target // newly activated tab
//                e.relatedTarget // previous active tab
//                $.ajax({
//                    url: $(this.form).attr('action'),
//                    type: "POST",
//                    data: data,
//                    success: function(response){
//                        console.log(response);
//                    }
//                });
            })

        }
    });
});

</script>