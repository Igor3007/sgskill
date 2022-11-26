<main>
  <section class="section-blog">
    <div class="container">
      <div class="blog">
        <div class="blog__nav">
          <ul class="slide-menu">
            <li class="<?= ('all' == $id_cat ? 'active' : '') ?>"><a href="/blog/new/">Новые</a></li>

            <? foreach ($allCategories as $cat) : ?>
              <li class="<?= ($cat['id'] == $id_cat ? 'active' : '') ?>"><a href="/blog/category/<?= $cat['id'] ?>"><?= $cat['name'] ?></a></li>
            <? endforeach; ?>

            <li class="sliding-line"></li>
          </ul>
        </div>
        <div class="blog__list">

          <? if (count($allArticle)) : ?>

            <? foreach ($allArticle as $item) : ?>

              <div class="blog__item">
                <div class="blog-post">
                  <div class="blog-post__image">

                    <picture>

                      <img src="<?= getMediaURL($item['image'])['orig'] ?>" loading="lazy" alt="image" />
                    </picture>

                    <a href="/blog/article/<?= $item['alias'] ?>">
                      <span class="ic_eye" style="background-image: url('/img/view.svg')"></span>
                    </a>

                  </div>
                  <div class="blog-post__main">
                    <div class="blog-post__tags">
                      <ul>

                        <? foreach (explode(',', $item['tags']) as $tag) : ?>

                          <li><a href="/blog/tag/<?= $tag ?>"><?= $tag ?></a></li>

                        <? endforeach; ?>
                      </ul>
                    </div>
                    <div class="blog-post__title"><a href="/blog/article/<?= $item['alias'] ?>"><?= $item['title'] ?></a></div>
                    <div class="blog-post__desc"><?= $item['pretext'] ?></div>
                  </div>
                </div>
              </div>

            <? endforeach; ?>

          <? else : ?>

            <div class="blog-empty">Не найдено постов для данной категории</div>

          <? endif; ?>

        </div>
        <div class="blog__pagination">
          <button class="btn">Показать еще</button>
        </div>
      </div>
    </div>
  </section>
</main>