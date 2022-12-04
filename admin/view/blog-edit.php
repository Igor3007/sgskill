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
              <li><a data-remove="removePost" data-remove-id="<?= $data['id'] ?>">Удалить пост</a></li>
              <li><a href="/blog/article/<?= $data['alias'] ?>" target="_blank">Посмотреть на сайте</a></li>
            </ul>
          </div>

          <div class="page-moderator__main">
            <div class="page-moderator__h1">Редактировать пост</div>
            <form action="createPost" method="POST" data-form="content">
              <div class="form">
                <div class="form__item">
                  <div class="form__subitem">
                    <div class="form-image">

                      <div class="form-image__cover  active <?= ($data['image'] ? 'cover--loaded' : '') ?>" data-image-upload="form">
                        <div class="form-image__btn">
                          <label class="attach-label"><span class="bgimage lazyload" data-bg="/img/common/camera.png"></span><span class="text-upload">Выбрать файл</span>
                            <input type="file" name="image" data-attach="poster">
                          </label>
                        </div>
                        <div class="form-image__image ">
                          <picture><img src="<?= getMediaURL($data['image'])['orig'] ?>" data-attach="preview-poster"></picture>
                        </div>
                      </div>




                    </div>
                  </div>
                </div>

                <div class="form__label">Информация</div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="title" placeholder="Загловок" value="<?= $data['title'] ?>">
                  </div>
                </div>

                <div class="form__item">
                  <div class="form__subitem">
                    <select name="category" placeholder="Категория" id="">
                      <?= activeSelect($arraySelect, $data['category']) ?>
                    </select>
                  </div>

                  <div class="form__subitem">
                    <select name="status" placeholder="Статус" id="">
                      <?= activeSelect([
                        '1' => 'Разблокирован',
                        '0' => 'Заблокирован',
                      ], $data['status']) ?>
                    </select>
                  </div>

                  <div class="form__subitem">
                    <input type="text" class="input-material--date input-datepicker" data-datepicker-lang="ru" name="date_create" placeholder="Дата" value="<?= $data['date_create'] ?>">
                  </div>
                </div>



                <div class="form__label">Краткое описание</div>

                <div class="form__item">
                  <div class="form__subitem">
                    <textarea name="pretext" id="" cols="30" rows="2" placeholder="Описание"> <?= $data['pretext'] ?></textarea>
                  </div>
                </div>

                <div class="form__label">Хеш теги</p>
                </div>

                <div class="form__item">
                  <div class="form__subitem">
                    <textarea name="tags" id="" cols="30" rows="2" placeholder="Теги через запятую"><?= $data['tags'] ?></textarea>
                  </div>
                </div>

                <div class="form__label">SEO</div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="seo_title" placeholder="title" value="<?= $data['seo_title'] ?>">
                  </div>
                </div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="seo_desc" placeholder="description" value="<?= $data['seo_desc'] ?>">
                  </div>
                </div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="seo_keywords" placeholder="keywords" value="<?= $data['seo_keywords'] ?>">
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

                        <? if ($data['content']) : ?>

                          <? foreach (json_decode($data['content'], true) as $block) : ?>
                            <?= createBlockEditor($block) ?>
                          <? endforeach; ?>

                        <? else : ?>

                          <div class="editor__empty" style="display: none">
                            Выбирайте нужные блоки в левой части редактора и создайте ваш пост!
                          </div>

                        <? endif; ?>


                      </div>
                    </div>

                  </div>

                </div>



                <div class="form__item">
                  <div class="form__subitem">
                    <input type="hidden" name="post_id" value="<?= $data['id'] ?>">
                    <button class="btn btn-full">Сохранить</button>
                  </div>
                  <div class="form__subitem"></div>
                </div>

              </div>
            </form>

            <div class="page-moderator__comments">

              <div class="post-comment">

                <div class="post-comment__head">
                  <div class="post-comment__title">Коментарии</div>
                  <div class="post-comment__add">
                    <button class="btn btn-small" data-comment-edit="" data-post-id="<?= $data['id'] ?>">Добавить</button>
                  </div>
                </div>

                <div class="post-comment__list">



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
                            <div class="card-comments__status"><?= (!$item['status'] ? '<span class="status-locked" >Заблокирован</span>' : '') ?></div>
                            <div class="card-comments__edit" data-comment-edit="<?= $item['id'] ?>" data-post-id="<?= $data['id'] ?>">Изменить</div>
                            <div class="card-comments__date"><?= setDates($item['date_create'], array(true, false)) ?></div>
                          </div>

                        </div>

                      </div>

                    <? endforeach; ?>

                  <? else : ?>
                    <div class="editor__empty">Для данного поста нет коментарием</div>
                  <? endif; ?>

                </div>

              </div>

            </div>
          </div>



        </div>
      </div>
    </div>
  </section>
</main>