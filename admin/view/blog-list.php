<main>
      <section class="section-page-moderator">
        <div class="container">
          <div class="page-moderator">
            <div class="page-moderator__aside">
              <div class="moderator-aside">
                <div class="moderator-aside__wrp">
                  <div class="moderator-aside__nav">
                    <? require_once($_SERVER['DOCUMENT_ROOT'].'/admin/view/parts/left-bar.php'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="page-moderator__content">
              <div class="page-moderator__topbar">
                <ul>
                  <li><a href="?view=blog-create">Добавить статью</a></li>
                  <li><a href="">Категории</a></li>
                </ul>
              </div>
              <div class="page-moderator__main">
                <div class="page-moderator__h1">Блог</div>
                 <table>
                  <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Создан</th>
                    <th>Просмотров</th>
                  </tr>

                  <? foreach($allLesson as $item): ?>
                    <tr>
                      <td><?=$item['id']?></td>
                      <td><a href="?view=lesson-edit&id=<?=$item['id']?>"> <?=$item['name']?> </a></td>
                      <td>15 ноября</td>
                      <td>10</td>
                    </tr>
                  <? endforeach; ?>

                 </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>