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
                   
                  <li><a href="?view=user-create">Добавить пользователя</a></li>
                   
                </ul>
              </div>
              <div class="page-moderator__main">
                <div class="page-moderator__h1">Все пользователи</div>
                 <table>
                  <tr>
                    <th>id</th>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Уровень</th>
                  </tr>

                  <?
                  
                  $access = [
                    '1' => 'Пользователь',
                    '2' => 'Модератор',
                    '3' => 'Администратор',
                  ];

                  ?>

                  <? foreach($allUsers as $item): ?>
                    <tr>
                      <td><?=$item['id']?></td>
                      <td><?=$item['name']?></td>
                      <td><?=$item['email']?></td>
                      <td><?=$access[$item['access']]?></td>
                    </tr>
                  <? endforeach; ?>

                 </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>