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
            <li><a href="#">
                <svg width="25" height="25">
                  <use xlink:href="/img/sprites/sprite.svg#ic_vk"></use>
                </svg></a></li>
            <li><a href="#">
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
    </div>
  </section>

</main>