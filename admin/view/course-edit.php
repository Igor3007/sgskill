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
              <li><a data-remove="removeCourse" data-remove-id="<?= $courseData['id'] ?>">Удалить курс</a></li>
              <li><a href="/user/course/<?= $courseData['id'] ?>" target="_blank">Посмотреть на сайте</a></li>
            </ul>
          </div>

          <div class="page-moderator__main">
            <div class="page-moderator__h1">Редактировать курс</div>
            <form action="createCourse" method="POST" data-edit-course="">
              <div class="form">
                <div class="form__item">
                  <div class="form__subitem">
                    <div class="form-image">

                      <div class="form-image__cover form-image__cover--round active cover--loaded" data-image-upload="form">
                        <div class="form-image__btn">
                          <label class="attach-label"><span class="bgimage lazyload" data-bg="/img/common/camera.png"></span><span class="text-upload">Выбрать файл</span>
                            <input type="file" name="image" data-attach="poster">
                          </label>
                        </div>
                        <div class="form-image__image form-image__image--round ">
                          <picture><img src="<?= getMediaURL($courseData['image'])['orig'] ?>" data-attach="preview-poster"></picture>
                        </div>
                      </div>

                      <div class="form-image__progress hide">
                        <div class="progress-bar">
                          <div class="progress-bar__title">Зарузка 66%</div>
                          <div class="progress-bar__state"><span style="width: 66%"></span></div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="form__label">Информация</div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" name="name" placeholder="Название курса" value="<?= $courseData['name'] ?>">
                  </div>
                </div>

                <div class="form__item">
                  <div class="form__subitem">
                    <input type="text" class="input-material--date input-datepicker" data-datepicker-lang="ru" name="date_start" placeholder="Дата начала" value="<?= $courseData['date_start'] ?>">
                  </div>
                  <div class="form__subitem">
                    <input type="text" class="input-material--date input-datepicker" data-datepicker-lang="ru" name="date_finish" placeholder="Дата окончания" value="<?= $courseData['date_finish'] ?>">
                  </div>
                </div>

                <div class="form__label">Краткое описание</div>

                <div class="form__item">
                  <div class="form__subitem">
                    <textarea name="preview_text" id="" cols="30" rows="10" placeholder="Описание"><?= $courseData['preview_text'] ?></textarea>
                  </div>
                </div>

                <div class="form__label">Уроки курса</div>

                <? if (true) : ?>

                  <div class="lesson-list">

                    <div class="lesson-list__list">
                      <ul> </ul>
                    </div>

                    <div class="lesson-list__action">
                      <ul>
                        <li>
                          <div class="btn btn-small" data-cle="addLesson">Добавить уроки</div>
                        </li>
                        <li>
                          <div class="btn btn-small" data-cle="addSeparator">Добавить Главу</div>
                        </li>
                      </ul>
                    </div>

                    <script>
                      const LOAD_SJON = '<?= json_encode($lineupArray) ?>';
                    </script>

                  </div>


                <? else : ?>
                  <div>Уроки не найдены</div>
                <? endif; ?>

                <div class="form__item">
                  <div class="form__subitem">



                  </div>
                </div>


                <div class="form__item">
                  <div class="form__subitem">
                    <input type="hidden" name="course_id" value="<?= $_GET['id'] ?>">
                    <button class="btn btn-full" type="submit">Сохранить</button>
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