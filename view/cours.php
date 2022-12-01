<div class="cours-detail">
  <div class="cours-detail__list">



    <? if ($courseData['lineup']) : ?>

      <? foreach ($lineupArray as $item) : ?>

        <? if ($item['type'] == 'lesson' && isset($lessonData[$item['id']])) : ?>

          <div onClick="window.location.href='/user/lesson/<?= $item['id'] ?>'" class="cours-detail__item <?= (getLessonStatus($lessonData[$item['id']]) ? 'cours-detail__item--' . getLessonStatus($lessonData[$item['id']]) : '') ?> ">
            <div class="card-lesson">

              <div class="card-lesson__arrow">

                <? if (getLessonStatus($lessonData[$item['id']]) == 'completed' || getLessonStatus($lessonData[$item['id']]) == 'passed') : ?>
                  <span class="ic_done"></span>
                <? else : ?>
                  <span class="ic_arrow-left"></span>
                <? endif; ?>


              </div>

              <div class="card-lesson__image">
                <a href="/user/lesson/<?= $item['id'] ?>">
                  <picture>
                    <img src="<?= getMediaURL($lessonData[$item['id']]['preview'])['orig'] ?>" loading="lazy" alt="image" />
                  </picture>
                </a>
              </div>

              <div class="card-lesson__main">

                <? if ($lessonData[$item['id']]['stop'] == 1) : ?>
                  <div class="card-lesson__wrn">Необходимо выполнить задание (стоп-урок)</div>
                <? endif ?>

                <div class="card-lesson__title">
                  <a href="/user/lesson/<?= $item['id'] ?>"><?= $lessonData[$item['id']]['name'] ?></a>
                </div>

                <? if (getLessonStatus($lessonData[$item['id']]) == 'locked') : ?>
                  <div class="card-lesson__info">Неободимо пройти предыдущий урок</div>
                <? endif ?>

                <? if (getLessonStatus($lessonData[$item['id']]) == 'passed') : ?>
                  <div class="card-lesson__info">Доступ к уроку закончился</div>
                <? endif ?>

              </div>
            </div>
          </div>

        <? endif; ?>

        <? if ($item['type'] == 'separator') : ?>
          <div class="line-separator"><span>
              <h1> <?= $item['name'] ?> </h1>
            </span></div>
        <? endif; ?>

      <? endforeach; ?>

    <? else : ?>

      <div>У данного курса пока нету уроков</div>

    <? endif ?>

  </div>
</div>