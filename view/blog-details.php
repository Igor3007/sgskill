<main>

  <section class="section-blog-details">
    <div class="container">
      <div class="blog-details">
        <div class="blog-details__title">
          <h1><?= $data['title'] ?></h1>
        </div>
        <div class="blog-details__tags">
          <ul>
            <? foreach (explode(',', $data['tags']) as $tag) : ?>
              <li><a href="/blog/tag/<?= substr(trim($tag), 1) ?>"><?= $tag ?></a></li>
            <? endforeach; ?>
          </ul>
        </div>
        <div class="blog-details__content">
          <? if ($postContent) : ?>

            <? foreach ($postContent as $item) : ?>

              <?= parseLesson($item) ?>

            <? endforeach; ?>

          <? else : ?>

            <div class="info-msg"> Нет содержимого для поста </div>

          <? endif; ?>
        </div>
        <div class="blog-details__share">
          <div class="blog-details__share-title">Поделиться</div>
          <ul>
            <li><a href="https://vk.com/share.php?url=https://sg-skills.ru/blog/<?= $data['alias'] ?>">
                <svg width="25" height="25">
                  <use xlink:href="/img/sprites/sprite.svg#ic_vk"></use>
                </svg></a></li>
            <li><a href="https://t.me/share/url?url=https://sg-skills.ru/blog/<?= $data['alias'] ?>&text=<?= $data['title'] ?>">
                <svg width="25" height="25">
                  <use xlink:href="/img/sprites/sprite.svg#ic_tg"></use>
                </svg></a></li>
            <li><a href="#">
                <svg width="25" height="25">
                  <use xlink:href="/img/sprites/sprite.svg#ic_vb"></use>
                </svg></a></li>
            <li><a href="#">
                <svg width="25" height="25">
                  <use xlink:href="/img/sprites/sprite.svg#ic_wa"></use>
                </svg></a></li>
          </ul>
        </div>
      </div>

      <div class="blog-comments">
        <div class="blog-comments__title">Отзывы</div>
        <div class="blog-comments__list">
          <? if ($comments) : ?>

            <? foreach ($comments as $item) : ?>



              <div class="card-comments">

                <div class="card-comments__image">
                  <picture>
                    <a href="<?= $item['link'] ?>" rel="nofollow">
                      <img src="<?= getMediaURL($item['image'])['orig'] ?>" alt="">
                    </a>
                  </picture>
                </div>

                <div class="card-comments__main">

                  <div class="card-comments__name">
                    <a href="<?= $item['link'] ?>"><?= $item['name'] ?></a>
                  </div>
                  <div class="card-comments__text" data-comment="show-text"><?= $item['text'] ?></div>

                  <div class="card-comments__prop">
                    <div class="card-comments__date"><?= setDates($item['date_create'], array(true, false)) ?></div>
                  </div>

                </div>

              </div>

            <? endforeach; ?>

          <? else : ?>
            <div class="editor__empty">Для данного поста нет коментариев</div>
          <? endif; ?>
        </div>
      </div>

    </div>
  </section>

</main>