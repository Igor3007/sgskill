   <footer>
     <div class="container">
       <div class="footer">
         <div class="footer__copy"><?= $SETTING['footer']['copyright'] ?></div>
         <?

          /* <div class="footer__social">
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
       </div> */

          ?>

       </div>
     </div>
     <div class="main-menu" data-menu="container">
       <div class="main-menu__wrp">
         <div class="main-menu__nav">
           <nav>
             <ul>
              
                <? if ($_SESSION['user']) : ?>
                  <li> <a href="/user/"> <span>Мои курсы</span> </a> </li>
                <? endif; ?>

                <? foreach ($SETTING['menu']['left'] as $item) : ?>
                  <li><a href="<?= $item[1] ?>"><?= $item[0] ?></a></li>
                <? endforeach; ?>

                <li><a href="<?= $SETTING['menu']['right'][1][1] ?>"><?= $SETTING['menu']['right'][1][0] ?></a></li>

                <? if (!$_SESSION['user']) : ?>
                  <li><a href="<?= $SETTING['menu']['right'][2][1] ?>"><?= $SETTING['menu']['right'][2][0] ?></a></li>
                <? endif; ?>

             </ul>
           </nav>
         </div>
         <div class="main-menu__phones">

           <div class="main-menu__worktime"><span><?= $SETTING['footer']['copyright'] ?></span></div>
         </div>
       </div>
     </div>
   </footer>


   <?/* block scripts */ ?>

   <? foreach ($PAGE['SCRIPTS'] as $link) : ?>
     <script src="<?= $link ?>"> </script>
   <? endforeach; ?>

   </body>

   </html>