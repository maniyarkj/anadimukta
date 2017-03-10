<nav class="navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">SMVS</a>
        </div>
        <?php echo $this->element('navigation/superadmin'); ?>
    </div><!--/.container-fluid -->
</nav>
<?php
// Javascript added for multilevel menu items
$script = '
$(function(){
    $(".dropdown-menu > li > a.trigger").on("click",function(e){
        var current=$(this).next();
        var grandparent=$(this).parent().parent();
        if($(this).hasClass("left-caret")||$(this).hasClass("right-caret"))
                $(this).toggleClass("right-caret left-caret");
        grandparent.find(".left-caret").not(this).toggleClass("right-caret left-caret");
        grandparent.find(".sub-menu:visible").not(current).hide();
        current.toggle();
        e.stopPropagation();
    });
    $(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
        var root=$(this).closest(".dropdown");
        root.find(".left-caret").toggleClass("right-caret left-caret");
        root.find(".sub-menu:visible").hide();
    });
});
';
echo $this->Html->scriptBlock(
    $script,
    array(
        'inline' => true,
        'safe' => false)
);