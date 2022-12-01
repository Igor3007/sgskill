<div class="courses-block">
  <div class="courses-block__list">

    <? if ($courses) : ?>

      <? foreach ($courses as $item) : ?>
        <div class="courses-block__item <?= (!getStateAccessCourse($userCourseProps[$item['id']]) ? 'courses-block__item--locked' : '') ?>" onclick="window.location.href='/user/cours/<?= $item['id'] ?>'">
          <div class="card-cours">
            <div class="card-cours__image">
              <picture>
                <img src="<?= getMediaURL($item['image'])['orig'] ?>" loading="lazy" alt="image" />
              </picture>
            </div>
            <div class="card-cours__main">
              <div class="card-cours__title"><a href="/user/cours/<?= $item['id'] ?>"><?= $item['name'] ?></a></div>
              <div class="card-cours__link"><?= $item['preview_text'] ?></div>
              <div class="card-cours__desc">

                Курс доступен:

                <?= (getStateAccessCourse($userCourseProps[$item['id']]) === 'permanent' ? 'Бессрочно' : '') ?>

                <?= ($userCourseProps[$item['id']]['start'] ? ' c ' . setDates($userCourseProps[$item['id']]['start'], array(true, false)) : '') ?>

                <?= ($userCourseProps[$item['id']]['end'] ? ' по ' . setDates($userCourseProps[$item['id']]['end'], array(true, false)) : '') ?>

              </div>
            </div>
          </div>
        </div>
      <? endforeach; ?>

    <? else : ?>

      <div>У вас нету доступных курсов</div>

    <? endif; ?>

  </div>
</div>