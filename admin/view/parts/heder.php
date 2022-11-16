<body class="perf-no-animation">
    <header class="header--login">
      <div class="container">
        <div class="header">
          <div class="header-top">
           
            <div class="header-top__logo">
              <div class="header-top__logo-main"><a href="/">Панель управления</a></div>
            </div>
            <div class="header-top__user <?=($_SESSION['user']['access'] > 1 ? 'header-top__user--moderator':'')?>">
              <a data-user-menu="open" data-link="/admin/"> 
                <span class="bgimage lazyload" data-bg="<?=getMediaURL($_SESSION['user']['photo'])['orig']?>"></span></a></div>
          </div>
        </div>
      </div>
    </header>