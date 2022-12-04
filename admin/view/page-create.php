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

          <div class="page-moderator__main">
            <div class="page-moderator__h1">Добавить страницу</div>
            <form action="createPage" method="POST" data-form="content">
              <div class="form">


                <div class="form__label">Информация</div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="title" placeholder="Загловок">
                  </div>

                  <div class="form__subitem">
                    <select name="status" placeholder="Статус" id="">
                      <?= activeSelect([
                        '1' => 'Разблокирован',
                        '0' => 'Заблокирован',
                      ], 1) ?>
                    </select>
                  </div>
                </div>



                <div class="form__label">SEO</div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="seo_title" placeholder="title">
                  </div>
                </div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="seo_desc" placeholder="description">
                  </div>
                </div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="seo_keywords" placeholder="keywords">
                  </div>
                </div>

                <div class="form__label">Содержание</div>


                <div class="form__item">
                  <div class="form__subitem">

                    <div class="editor">
                      <div class="editor__aside">
                        <ul>
                          <li data-editor-block="header"> <span class="ic_header" title="Заголовок"></span> </li>
                          <li data-editor-block="video"> <span class="ic_video" title="Видео"></span> </li>
                          <li data-editor-block="image"> <span class="ic_image" title="Image"></span> </li>
                          <li data-editor-block="audio"> <span class="ic_audio" title="аудио"></span> </li>
                          <li data-editor-block="text"> <span class="ic_text" title="Текст"></span> </li>
                          <li data-editor-block="spoiler"> <span class="ic_spoiler" title="Спойлер"> </li>
                          <li data-editor-block="task"> <span class="ic_task" title="Задание"></span> </li>
                          <li data-editor-block="file"> <span class="ic_file" title="файл"></span> </li>
                          <li data-editor-block="link"> <span class="ic_link" title="ссылка"></span> </li>
                          <li data-editor-block="stories"> <span class="ic_stories" title="series"></span></li>
                        </ul>
                      </div>
                      <div class="editor__content">

                        <div class="editor__empty">
                          Выбирайте нужные блоки в левой части редактора и создайте ваш пост!
                        </div>

                      </div>
                    </div>

                  </div>

                </div>



                <div class="form__item">
                  <div class="form__subitem">
                    <button class="btn btn-full">Сохранить</button>
                  </div>
                  <div class="form__subitem"></div>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>