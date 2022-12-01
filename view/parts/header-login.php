<header class="header--login">
  <div class="container">
    <div class="header">
      <div class="header-top">
        <div class="header-top__menu">
          <div class="btn-burger" data-menu="btn"><i></i><i></i><i></i></div>
        </div>
        <div class="header-top__logo">
          <div class="header-top__logo-main"><a href="/"><?= $SETTING['header']['logo-main'] ?></a></div>
          <div class="header-top__logo-sl"><?= $SETTING['header']['logo-sl'] ?></div>
        </div>
        <div class="header-top__user <?= ($_SESSION['user']['access'] > 1 ? 'header-top__user--moderator' : '') ?>">
          <a data-user-menu="open" data-link="/user/">
            <span class="bgimage lazyload" data-bg="<?= $user['photo'] ?>"></span></a>
        </div>
      </div>
    </div>
  </div>
</header>