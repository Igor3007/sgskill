
<?php

function getActiveMenu($item){
  return $_GET['view'] == $item ? 'active':'' ;
}

?>

<ul>
  <li class="<?=getActiveMenu('user-list')?>"><a href="?view=user-list">Пользователи </a></li>
  <li class="<?=getActiveMenu('course-list')?>" ><a href="?view=course-list">Курсы </a></li>
  <li class="<?=getActiveMenu('lesson-list')?>" ><a href="?view=lesson-list">Уроки </a></li>
  <li class="<?=getActiveMenu('pages-list')?>" ><a href="?view=pages-list">Страницы </a></li>
  <li class="<?=getActiveMenu('blog-list')?>" ><a href="?view=blog-list">Блог</a></li>
</ul>