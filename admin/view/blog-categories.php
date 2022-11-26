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
                  <li><a href="#" data-popup-blog-catig="">Добавить</a></li>
                </ul>
              </div>
               
              <div class="page-moderator__main">
                <div class="page-moderator__h1">Категории блога</div>
                
                <table>
                  <tr>
                    <th>id</th>
                    <th>Название</th>
                     
                    <th></th>
                  </tr>

                  <? foreach($allCatig as $item): ?>
                    <tr>
                      <td><?=$item['id']?></td>
                      <td><a href=""> <?=$item['name']?> </a></td>
                       
                      <td>
                        <span data-popup-blog-catig="<?=$item['id']?>">Изменить</span>
                        <span data-remove="removeCatig" data-remove-id="<?=$item['id']?>" >Удалить</span>
                      </td>
                    </tr>
                  <? endforeach; ?>

                 </table>

              </div>
            </div>
          </div>
        </div>
      </section>
    </main>