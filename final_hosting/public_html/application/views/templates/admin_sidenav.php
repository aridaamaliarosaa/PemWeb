<div class="col-sm-2 sidenav hidden-xs">
    <h2> Admin Panel </h2>
    <ul class="nav nav-pills nav-stacked">
        <li> <?= anchor('home_admin', 'Dashboard'); ?></li>
        <li> <?= anchor('home_admin/transaction', 'Transactions'); ?></li>
        <li> <?= anchor('home_admin/product', 'Products'); ?></li>
        <li> <?= anchor('home_admin/user', 'Users'); ?></li>
        <li> <?= anchor('login', 'Log Out'); ?></li>
    </ul><br>
</div>