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
                <li><a href="/about/">О проекте</a></li>
                <li><a href="/blog/">Обучение</a></li>
              </ul>
            </nav>
          </div>
          <div class="header-top__logo">
            <div class="header-top__logo-main"><a href="/">SO GOOD</a></div>
            <div class="header-top__logo-sl">Skills for Life</div>
          </div>
          <div class="header-top__right">
            <nav>
              <ul>
                <li><a href="/blog/">Новости</a></li>

                <? if(!$_SESSION['user']): ?>
                  <li><a href="/login/">Войти</a></li>
                <? else: ?>
                  <li>
                    <a href="/user/">
                      <svg width="12" height="12" fill="#F4B43F">
                        <use xlink:href="/img/sprites/sprite.svg#ic_user"></use>
                      </svg>  
                      <span>Аккаунт</span>
                    </a></li>
                <? endif; ?>

                
              </ul>
            </nav>
          </div>
          <div class="header-top__login"><a href="/login/">
              <svg width="22" height="22">
                <use xlink:href="/img/sprites/sprite.svg#ic_user"></use>
              </svg></a></div>
        </div>
      </div>
    </div>
  </header>