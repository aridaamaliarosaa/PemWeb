<nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= anchor('home_admin', 'Admin Panel', ['class' => 'navbar-brand']); ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li> <?= anchor('home_admin', 'Dashboard'); ?> </li>
                <li> <?= anchor('home_admin/transaction', 'Transactions'); ?> </li>
                <li> <?= anchor('home_admin/product', 'Products'); ?> </li>
                <li> <?= anchor('home_admin/user', 'User'); ?> </li>
            </ul>
        </div>
    </div>
</nav>