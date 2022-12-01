<header>
  <div class="container">
    <div class="header">
      <div class="header-top">
        <div class="header-top__menu">
          <div class="btn-burger" data-menu="btn"> <i></i><i></i><i></i></div>
        </div>
        <div class="header-top__left">
          <nav>
            <ul>
              <? foreach ($SETTING['menu']['left'] as $item) : ?>
                <li><a href="<?= $item[1] ?>"><?= $item[0] ?></a></li>
              <? endforeach; ?>
            </ul>
          </nav>
        </div>
        <div class="header-top__logo">
          <div class="header-top__logo-main"><a href="/"><?= $SETTING['header']['logo-main'] ?></a></div>
          <div class="header-top__logo-sl"><?= $SETTING['header']['logo-sl'] ?></div>
        </div>
        <div class="header-top__right">
          <nav>
            <ul>
              <li><a href="<?= $SETTING['menu']['right'][1][1] ?>"><?= $SETTING['menu']['right'][1][0] ?></a></li>


              <? if (!$_SESSION['user']) : ?>
                <li><a href="<?= $SETTING['menu']['right'][2][1] ?>"><?= $SETTING['menu']['right'][2][0] ?></a></li>
              <? else : ?>
                <li>
                  <a href="/user/">
                    <span>Курсы</span>
                  </a>
                </li>
              <? endif; ?>


            </ul>
          </nav>
        </div>

        <? if (!$_SESSION['user']) : ?>
          <div class="header-top__login"><a href="/login/">
              <svg width="22" height="22">
                <use xlink:href="/img/sprites/sprite.svg#ic_user"></use>
              </svg></a>
          </div>
        <? else : ?>
          <div class="header-top__user header-top__user--main <?= ($_SESSION['user']['access'] > 1 ? 'header-top__user--moderator' : '') ?>">
            <a data-user-menu="open" data-link="/user/profile/">
              <span class="bgimage lazyload" data-bg="<?= getMediaURL($_SESSION['user']['photo'])['orig'] ?>"></span></a>
          </div>
        <? endif; ?>


      </div>
    </div>
  </div>
</header>