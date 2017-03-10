<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li><a href="/">Dashboard</a></li>
    <?php foreach ($backend_nav as $controller) : ?>
        <li class="dropdown">
            <a href="<?php echo $controller['url']; ?>" class="dropdown-toggle" data-toggle="dropdown"
               role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo $controller['title']; ?> <span class="caret"></span>
            </a>
            <?php if (!empty($controller['submenu'])) : ?>
            <ul class="dropdown-menu">
                <?php foreach ($controller['submenu'] as $submenu) : ?>
                <li>
                    <a href="<?php echo $submenu['url']; ?>">
                        <?php echo $submenu['title']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<!--        <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
        <li><a href="../navbar-static-top/">Static top</a></li>-->
        <li><a href="/users/logout">Logout</a></li>
    </ul>
</div><!--/.nav-collapse -->