<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= anchor('home/profile', 'Hi, ' . $this->session->userdata('fullname'), ['class' => 'navbar-brand']) ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li> <?= anchor('home', 'Home') ?> </li>
                <li> <?= anchor('product', 'Products') ?> </li>
                <li> <?= anchor('cart', 'Cart') ?> </li>
                <li> <?= anchor('transaction', 'Transactions') ?> </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?= anchor('login', '<span class="glyphicon glyphicon-log-out"></span> Log out'); ?> </li>
            </ul>
        </div>
    </div>
</nav>
