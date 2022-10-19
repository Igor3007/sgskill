<div class="cours-detail">
  <div class="cours-detail__list">

  <? foreach($lessons as $item): ?>

    <div class="cours-detail__item">
      <div class="card-lesson">
        <div class="card-lesson__arrow">
          <svg width="20" height="20">
            <use xlink:href="/img/sprites/sprite.svg#ic_arr-next"></use>
          </svg>
        </div>
        <div class="card-lesson__image"><a href="/user/lesson/<?=$item['id']?>">
            <picture>
               <img src="<?=getMediaURL($item['preview'])['orig']?>" loading="lazy" alt="image"/>
            </picture></a></div>
        <div class="card-lesson__main">

          <?if($item['stop'] == 1):?>
            <div class="card-lesson__wrn">Необходимо выполнить задание (стоп-урок)</div>
          <?endif?>

          
          <div class="card-lesson__title"><a href="/user/lesson/<?=$item['id']?>"><?=$item['name']?></a></div>
        </div>
      </div>
    </div>

    <? endforeach; ?>

    <?if(!count($lessons)):?>
            <div class="card-lesson__wrn">Пока уроков нету =(</div>
    <?endif?>
     
  </div>
</div>