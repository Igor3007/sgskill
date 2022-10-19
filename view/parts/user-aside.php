<div class="moderator-aside">
  <div class="moderator-aside__wrp">
    <div class="moderator-aside__photo"><a href="/user/profile/">
        <picture>
           <img src="<?=$user['photo']?>" loading="lazy" alt="image"/>
        </picture></a></div>
    <div class="moderator-aside__name"><?=$user['name']?></div>
    <div class="moderator-aside__email"><?=$user['email']?></div>
    <div class="moderator-aside__nav-head"><a href="/user/courses/">Мои курсы</a></div>
    <div class="moderator-aside__nav">
      <ul>

          <?foreach($courses as $item):?>
            <li><a href="/user/cours/<?=$item['id']?>"><?=$item['name']?></a></li>
          <?endforeach;?>

      </ul>
    </div>

    <div class="moderator-aside__nav-head"><a href="/logout/">Выйти</a></div>
  </div>
</div>