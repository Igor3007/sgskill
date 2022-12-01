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

               <? foreach ($SETTING['menu']['left'] as $item) : ?>
                 <li><a href="<?= $item[1] ?>"><?= $item[0] ?></a></li>
               <? endforeach; ?>

               <? foreach ($SETTING['menu']['right'] as $item) : ?>
                 <li><a href="<?= $item[1] ?>"><?= $item[0] ?></a></li>
               <? endforeach; ?>

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