<main>
  <section class="section-page-moderator">
    <div class="container">
      <div class="page-moderator">
        <div class="page-moderator__aside">
          <div class="moderator-aside">
            <div class="moderator-aside__wrp">
              <div class="moderator-aside__nav">
                <? require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/view/parts/left-bar.php'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="page-moderator__content">
          <div class="page-moderator__topbar">
            <ul>
              <li><a href="?view=blog-create">Добавить статью</a></li>
              <li><a href="?view=blog-categories">Категории</a></li>
            </ul>
          </div>
          <div class="page-moderator__main">
            <div class="page-moderator__h1">Блог</div>
            <table>


              <? if (count($allArticle)) : ?>

                <tr>
                  <th>id</th>
                  <th>Название</th>
                  <th>Категория</th>
                  <th>Создан</th>
                  <th>Просмотров</th>
                </tr>

                <? foreach ($allArticle as $item) : ?>
                  <tr>
                    <td><?= $item['id'] ?></td>
                    <td><a href="?view=blog-edit&id=<?= $item['id'] ?>"> <?= $item['title'] ?> </a></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= setDates($item['date_create'], array(true, false)) ?></td>
                    <td><?= $item['hits'] ?></td>
                  </tr>
                <? endforeach; ?>

              <? else : ?>

                Пусто

              <? endif; ?>

            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>