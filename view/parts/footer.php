   <footer>
      <div class="container">
        <div class="footer">
          <div class="footer__copy">So Good Media © 2011 - 2022</div>
          <div class="footer__social">
            <ul>
              <li><a href="#">
                  <svg width="16" height="16">
                    <use xlink:href="/img/sprites/sprite.svg#ic_vk"></use>
                  </svg></a></li>
              <li><a href="#">
                  <svg width="16" height="16">
                    <use xlink:href="/img/sprites/sprite.svg#ic_tg"></use>
                  </svg></a></li>
            </ul>
          </div>
        </div>
      </div>
            <div class="main-menu" data-menu="container">
              <div class="main-menu__wrp">
                <div class="main-menu__nav">
                  <nav>
                    <ul>
                    <li><a href="/about/">О проекте</a></li>
                    <li><a href="/blog/">Обучение</a></li>
                    <li><a href="/blog/">Новости</a></li>
                    <li><a href="/login/">Личный кабинет</a></li>
                    </ul>
                  </nav>
                </div>
                <div class="main-menu__phones">
                  <div class="main-menu__number"><a href="#">+7 (999) 799-34-99</a></div>
                  <div class="main-menu__worktime"><span>с 9.00 до 19.00</span></div>
                </div>
              </div>
            </div>
    </footer>


    <?/* block scripts */?>

    <? foreach($PAGE['SCRIPTS'] as $link):?>
      <script src="<?=$link?>"> </script> 
    <? endforeach;?>

  </body>
</html>