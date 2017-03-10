<div class="md-padding">

    <div class="container">

        <div class="heading main centered">
            <h3 class="uppercase lg-title"><?php echo __('Grand'); ?> <span class="main-color"><?php echo __('Tradition'); ?></span></h3>
            <p><?php echo __('Meet our Spiritual Guides'); ?></p>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div id="traditions" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <?php foreach ($traditions as $idx => $tradition): ?>
                                    <?php echo $this->element('traditions/single-box', compact(array('tradition'))); ?>
                                    <?php echo (($idx+1) % 3 == 0 && count($traditions) != ($idx+1)) ? "</div></div><div class='item'><div class='row'>" : ''; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#traditions" role="button" data-slide="prev" style="background:none;">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="left:-10%; color: #000;"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#traditions" role="button" data-slide="next" style="background:none;">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="right:-10%; color: #000;"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
<?php $this->Js->buffer(<<<EOF
    $('#traditions').carousel({
        interval: 10000
    });
    $("#traditions item").first().addClass("active");

    if($('#traditions .item').length <= 1){
       $('.carousel-controls').addClass('hidden');
    }

    $('#traditions').on('slid.bs.carousel', function() {
        var numItems = $('#traditions .item').length;
        var curItem = $('#traditions .active').index('#traditions .item') + 1;
        if(numItems <= 1){
            $('.carousel-controls .carousel-control').addClass('disabled');
        }else{
            if(curItem == numItems){
                $('.carousel-controls .carousel-control.left').removeClass('disabled');
                $('.carousel-controls .carousel-control.right').addClass('disabled');
            }
            else if(curItem == 1){
                $('.carousel-controls .carousel-control.left').addClass('disabled');
                $('.carousel-controls .carousel-control.right').removeClass('disabled');
            }
            else{
                $('.carousel-controls .carousel-control.left').removeClass('disabled');
                $('.carousel-controls .carousel-control.right').removeClass('disabled');
            }
        }
    });
EOF
); ?>