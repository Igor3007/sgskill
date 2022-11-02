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
              
              <div class="page-moderator__main">
                <div class="page-moderator__h1">Добавить курс</div>
                <form action="createCourse" method="POST" data-form="">
                  <div class="form">
                    <div class="form__item">
                      <div class="form__subitem">
                        <div class="form-image">

                          <div class="form-image__cover form-image__cover--round active" data-image-upload="form">
                            <div class="form-image__btn">
                              <label class="attach-label"><span class="bgimage lazyload" data-bg="/img/common/camera.png"></span><span class="text-upload">Выбрать файл</span>
                                <input type="file" name="image" data-attach="poster">
                              </label>
                            </div>
                            <div class="form-image__image form-image__image--round">
                              <picture><img src="" data-attach="preview-poster"></picture>
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
                        <input type="text" name="name" placeholder="Название курса">
                      </div>
                    </div>

                    <div class="form__item">
                      <div class="form__subitem">
                        <input type="text" class="input-material--date input-datepicker" data-datepicker-lang="ru" name="date_start" placeholder="Дата начала">
                      </div>
                      <div class="form__subitem">
                        <input type="text" class="input-material--date input-datepicker" data-datepicker-lang="ru" name="date_finish" placeholder="Дата окончания">
                      </div>
                    </div>

                    <div class="form__label">Краткое описание</div>

                    <div class="form__item">
                      <div class="form__subitem">
                        <textarea name="preview_text" id="" cols="30" rows="10" placeholder="Описание"></textarea>
                      </div>
                    </div>
                     
                    <div class="form__label">Уроки курса</div>

                     
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