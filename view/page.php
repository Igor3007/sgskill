<main>
  <section class="section-page">
    <div class="container">
      <div class="page">
        <div class="page__title">
          <div class="line-separator"><span>
              <h1> <?= $PAGE['h1'] ?> </h1>
            </span></div>
        </div>
        <div class="page__content">

          <? if ($postContent) : ?>

            <? foreach ($postContent as $item) : ?>
              <?= parseLesson($item) ?>
            <? endforeach; ?>

          <? else : ?>
            <div class="info-msg"> Нет содержимого для поста </div>
          <? endif; ?>


        </div>
      </div>
    </div>
  </section>
</main>