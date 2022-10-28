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
                   
                  <li><a href="?view=user-create">Добавить курс</a></li>
                   
                </ul>
              </div>
              <div class="page-moderator__main">
                <div class="page-moderator__h1">Все курсы</div>
                 <table>
                  <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Начало</th>
                    <th>Окончание</th>
                  </tr>

                  <? foreach($allCourses as $item): ?>
                    <tr>
                      <td><?=$item['id']?></td>
                      <td><?=$item['name']?></td>
                      <td>12</td>
                      <td>11 </td>
                    </tr>
                  <? endforeach; ?>

                 </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>