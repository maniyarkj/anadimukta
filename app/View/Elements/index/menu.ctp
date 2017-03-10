<div class="responsive-nav">
    <!-- top navigation menu start -->
    <nav class="top-nav">
        <ul>
            <li><?php
                echo $this->Html->link(
                        '<span>' . __('Home') . '</span>',
                        array(
                    'controller' => 'index',
                    'action' => 'index',
                    'full_base' => true,
                        ), array('escape' => false)
                );
                ?></li>
            <li><a href="#"><span><?php echo __('Anadimukta'); ?></span></a>
                <ul>
                    <?php if ($locationPages[Page::LOCATION_MENU_ANADIMUKTA_ITEM_1]) :
                        $page = $locationPages[Page::LOCATION_MENU_ANADIMUKTA_ITEM_1];
                    ?>
                    <li><?php
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
                    ?></li>
                    <?php endif; ?>
                    <li><?php
                    echo $this->Html->link(
                        '<span>' . __('Spiritual Succession') . '</span>',
                        array(
                            'controller' => 'spiritual-succession',
                            'action' => 'index',
                            'full_base' => true,
                        ), array('escape' => false)
                    );
                    ?></li>
                    <?php if ($locationPages[Page::LOCATION_MENU_ANADIMUKTA_ITEM_2]) :
                        $page = $locationPages[Page::LOCATION_MENU_ANADIMUKTA_ITEM_2];
                    ?>
                    <li><?php
                    echo $this->Html->link(
                        '<span>' . $page['Page']['title'] . '</span>',
                        array(
                            'controller' => 'pages',
                            'action' => 'view',
                            'full_base' => true,
                            $page['Page']['id']
                        ), array('escape' => false)
                    );
                    ?></li>
                    <?php endif; ?>
                    <?php if ($locationPages[Page::LOCATION_MENU_ANADIMUKTA_ITEM_3]) :
                        $page = $locationPages[Page::LOCATION_MENU_ANADIMUKTA_ITEM_3];
                    ?>
                    <li><?php
                    echo $this->Html->link(
                        '<span>' . $page['Page']['title'] . '</span>',
                        array(
                            'controller' => 'pages',
                            'action' => 'view',
                            'full_base' => true,
                            $page['Page']['id'],
                        ), array('escape' => false)
                    );
                    ?></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li><a href="#"><span><?php echo __('Divya Prasangam'); ?></span></a>
                <ul>
                  <li><?php
                  echo $this->Html->link(
                      '<span>' . __('Divine Videos') . '</span>',
                      array(
                          'controller' => 'events',
                          'action' => 'index',
                          'full_base' => true,
                      ), array('escape' => false)
                  );
                  ?></li>
                    <li><?php
                    echo $this->Html->link(
                        '<span>' . __('Latest Prasangs') . '</span>',
                        array(
                            'controller' => 'prasangs',
                            'action' => 'index',
                            'full_base' => true,
                        ), array('escape' => false)
                    );
                    ?></li>
                    <?php foreach ($sections as $idx => $section) : ?>
                    <li><?php
                    echo $this->Html->link(
                        // TODO: This is a patch to display english title. I dont like this.
                        '<span>' . $this->BaseArray
                            ->getTranslationTextFromResultRow(
                                $section, 'nameTranslation', 'eng'
                            ) . '</span>',
                        array(
                            'controller' => 'prasangs',
                            'action' => 'section',
                            'full_base' => true,
                            $section['Section']['id'],
                        ), array('escape' => false)
                    );
                    ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><?php
                echo $this->Html->link(
                        '<span>' . __('Submit Prasang') . '</span>',
                        array(
                    'controller' => 'prasangrequests',
                    'action' => 'submit',
                    'full_base' => true
                        ), array('escape' => false)
                );
                ?></li>
            <li class="scroll"><?php
                echo $this->Html->link(
                        '<span>' . __('Feedback') . '</span>',
                        array(
                    'controller' => 'feedbacks',
                    'action' => 'add',
                    'full_base' => true
                    ), array('escape' => false)
                );
                ?></li>
            <li class="scroll"><?php
                if (!$this->Session->read('Auth.User')) {
                    echo $this->Html->link(
                            '<span>' . __('Login') . '</span>',
                            array(
                        'controller' => 'users',
                        'action' => 'login',
                        'full_base' => true
                            ), array('escape' => false)
                    );
                }
                else {
                    ?>
                    <a href="#"><span><?php echo $Auth->user('UserDetail.first_name'); ?></span></a>
                    <ul>
                        <?php /* <li><?php
                            echo $this->Html->link(
                                    __('Edit Profile'),
                                    array(
                                'controller' => 'users',
                                'action' => 'profile',
                                'full_base' => true
                                    ), array('escape' => false)
                            );
                            ?></li> */ ?>
                        <li><?php
                            echo $this->Html->link(
                                    __('Logout'),
                                    array(
                                'controller' => 'users',
                                'action' => 'logout',
                                'full_base' => true
                                    ), array('escape' => false)
                            );
                            ?></li>
                    </ul>
                <?php } ?></li>
        </ul>
    </nav>
    <!-- top navigation menu end -->
    <div class="f-right">
        <!-- top search start -->
        <div class="top-search">
            <a href="#"><span class="fa fa-search"></span></a>
            <div class="search-box">
                <form action="/index/search" method="get">
                    <input type="text" name="q" placeHolder="Type And Hit Enter..." value="<?php echo filter_input(INPUT_GET, 'q', FILTER_SANITIZE_SPECIAL_CHARS); ?>" />
                </form>
            </div>
        </div>
        <!-- top search end -->
        <?php /*
        <!-- cart start -->
        <div class="top-cart">
            <a href="#"><span class="fa fa-shopping-cart"></span><i class="cart-num main-bg white">3</i></a>
            <div class="cart-box main-border">
                <div class="empty hidden">Your shopping cart is empty!</div>
                <div class="mini-cart">
                    <ul class="mini-cart-list">
                        <li>
                            <a class="cart-mini-lft" href="product-left-bar.html"><img src="assets/images/shop/pro-1.jpg" alt=""></a>
                            <div class="cart-body">
                                <a href="product-left-bar.html">Ultimate Fashion Wear White</a>
                                <div class="price">$150</div>
                            </div>
                            <a class="remove" href="#"><i class="fa fa-times" title="Remove"></i></a>
                        </li>
                        <li>
                            <a class="cart-mini-lft" href="product-left-bar.html"><img src="assets/images/shop/pro-2.jpg" alt=""></a>
                            <div class="cart-body">
                                <a href="product-left-bar.html">Fashion Wear White</a>
                                <div class="price">$50</div>
                            </div>
                            <a class="remove" href="#"><i class="fa fa-times" title="Remove"></i></a>
                        </li>
                        <li>
                            <a class="cart-mini-lft" href="product-left-bar.html"><img src="assets/images/shop/pro-3.jpg" alt=""></a>
                            <div class="cart-body">
                                <a href="product-left-bar.html">Ultimate Fashion</a>
                                <div class="price">$220</div>
                            </div>
                            <a class="remove" href="#"><i class="fa fa-times" title="Remove"></i></a>
                        </li>
                    </ul>
                    <div class="mini-cart-total">
                        <div class="clearfix">
                            <div class="f-left">Sub-Total:</div>
                            <div class="f-right">$230.00</div>
                        </div>
                        <div class="clearfix">
                            <div class="f-left">Tax (-10.00):</div>
                            <div class="f-right">$12.05</div>
                        </div>
                        <div class="clearfix total">
                            <div class="f-left"><strong>Total:</strong></div>
                            <div class="f-right">$200.20</div>
                        </div>
                    </div>
                    <div class="checkout">
                        <a class="btn main-bg" href="cart.html">View Cart</a><a class="btn btn-default" href="checkout.html">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart end --> */ ?>
    </div>
</div>
