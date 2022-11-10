<div class="cours-detail">
  <div class="cours-detail__list">

  

    <?if($courseData['lineup']):?>

      <? foreach($lineupArray as $item): ?>

        <? if($item['type'] == 'lesson'): ?>

        <div class="cours-detail__item">
          <div class="card-lesson">

            <div class="card-lesson__arrow">
              <svg width="20" height="20">
                <use xlink:href="/img/sprites/sprite.svg#ic_arr-next"></use>
              </svg>
            </div>

            <div class="card-lesson__image">
              <a href="/user/lesson/<?=$item['id']?>">
                <picture>
                  <img src="<?=getMediaURL($lessonData[$item['id']]['preview'])['orig']?>" loading="lazy" alt="image"/>
                </picture>
              </a>
            </div>

            <div class="card-lesson__main">
              <?if($lessonData[$item['id']]['stop'] == 1):?>
                <div class="card-lesson__wrn">Необходимо выполнить задание (стоп-урок)</div>
              <?endif?>
              
              <div class="card-lesson__title">
                <a href="/user/lesson/<?=$item['id']?>"><?= $lessonData[$item['id']]['name'] ?></a>
              </div>

            </div>
          </div>
        </div>

        <? endif; ?>

        <? if($item['type'] == 'separator'): ?>
          <div class="line-separator"><span> <h1> <?=$item['name'] ?> </h1></span></div>
        <? endif; ?>

        <? endforeach; ?> 

    <?else:?>

      <div>У данного курса пока нету уроков</div>

    <?endif?>
     
  </div>
</div>