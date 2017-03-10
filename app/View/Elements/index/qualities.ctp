<div class="sm-padding wall-bg p-b-1">
    <div class="container">
        <div class="row">
            <div class="col-md-7 f-right">
                <div class="heading style3">
                    <?php /* <h3 class="uppercase">અનાદિમુક્ત સત્પુરુષની <span class="main-color">મુખ્ય લાક્ષણીકતાઓ</span></h3> */ ?>
                    <h3 class="uppercase">Characteristics of <span class="main-color">Anadimukt Satpurush</span></h3>
                    <p></p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="icon-box simple fx" data-animate="fadeIn" data-animation-delay="200">
                            <i class="lg-icon main-border icon-border border3px"><span>1</span></i>
                            <div class="icon-simple-desc">
                            	<?php if ($locationPages[Page::LOCATION_CHARACTERISTICS_1]) :
			                        $page = $locationPages[Page::LOCATION_CHARACTERISTICS_1];
			                    ?>
                                <h4 class="uppercase"><?php
				                    echo $this->Html->link(
				                        '<span>' . $page['Page']['title'] . '</span>',
				                        array(
				                            'controller' => 'pages',
				                            'action' => 'view',
				                            'full_base' => true,
				                            $page['Page']['id']
				                        ),
				                        array('escape' => false)
				                    );
				                    ?></h4>
				                    <p><?php echo $page['Page']['description'] ?></p>
                                <?php else: ?>
                                	<h4 class="uppercase">સર્વો૫રી ઉપાસના સમજાવે</h4>
                                	<p>ઉપાસના સત્પુરૂષના મુખ થકી જ સ્વરૂપનિષ્ઠાની વાત સમજ્યામાં આવે છે.  -ગ.મ. ૧૩</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="icon-box simple fx" data-animate="fadeIn" data-animation-delay="400">
                            <i class="lg-icon main-border icon-border border3px"><span>1</span></i>
                            <div class="icon-simple-desc">
                            	<?php if ($locationPages[Page::LOCATION_CHARACTERISTICS_2]) :
			                        $page = $locationPages[Page::LOCATION_CHARACTERISTICS_2];
			                    ?>
                                <h4 class="uppercase"><?php
				                    echo $this->Html->link(
				                        '<span>' . $page['Page']['title'] . '</span>',
				                        array(
				                            'controller' => 'pages',
				                            'action' => 'view',
				                            'full_base' => true,
				                            $page['Page']['id']
				                        ),
				                        array('escape' => false)
				                    );
				                    ?></h4>
				                    <p><?php echo $page['Page']['description'] ?></p>
                                <?php else: ?>
                                	<h4 class="uppercase">અનાદિમુક્તની પ્રાપ્તિ કરાવે</h4>
                                	<p>સત્પુરૂષમાં દ્રઢ પ્રિતિ એ જ ૫રમેશ્વરનું સાક્ષાતદર્શન થવાનું સાધન છે. -વ. ૧૧</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-box simple fx" data-animate="fadeIn" data-animation-delay="600">
                            <i class="lg-icon main-border icon-border border3px"><span>5</span></i>
                            <div class="icon-simple-desc">
                            	<?php if ($locationPages[Page::LOCATION_CHARACTERISTICS_3]) :
			                        $page = $locationPages[Page::LOCATION_CHARACTERISTICS_3];
			                    ?>
                                <h4 class="uppercase"><?php
				                    echo $this->Html->link(
				                        '<span>' . $page['Page']['title'] . '</span>',
				                        array(
				                            'controller' => 'pages',
				                            'action' => 'view',
				                            'full_base' => true,
				                            $page['Page']['id']
				                        ),
				                        array('escape' => false)
				                    );
				                    ?></h4>
				                    <p><?php echo $page['Page']['description'] ?></p>
                                <?php else: ?>
                                	<h4 class="uppercase">પંચવર્તમાન ૫ળાવે</h4>
                                	<p>મોટાપુરૂષની બાંધેલ મર્યાદા તેને લોપીને કોઈ સુખી થાતો નથી -ગ.મ. ૫૧</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="icon-box simple fx" data-animate="fadeIn" data-animation-delay="800">
                            <i class="lg-icon main-border icon-border border3px"><span>5</span></i>
                            <div class="icon-simple-desc">
                            	<?php if ($locationPages[Page::LOCATION_CHARACTERISTICS_4]) :
			                        $page = $locationPages[Page::LOCATION_CHARACTERISTICS_4];
			                    ?>
                                <h4 class="uppercase"><?php
				                    echo $this->Html->link(
				                        '<span>' . $page['Page']['title'] . '</span>',
				                        array(
				                            'controller' => 'pages',
				                            'action' => 'view',
				                            'full_base' => true,
				                            $page['Page']['id']
				                        ),
				                        array('escape' => false)
				                    );
				                    ?></h4>
				                    <p><?php echo $page['Page']['description'] ?></p>
                                <?php else: ?>
                                	<h4 class="uppercase">પંચવિષયમાંથી અનાસક્ત કરે</h4>
                                	<p>ઈન્દ્રિયોની ક્રિયાને સત્પુરૂષની સેવાને વિષે રાખે તો અંત:કરણ શુધ્ધ થાય... વિષય જીતાય -ગ.પ્ર. ૮</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <img alt="" src="/template/assets/images/tablo.png" class="fx" data-animate="swing" data-animation-delay="200">
            </div>
        </div>
    </div>
</div>