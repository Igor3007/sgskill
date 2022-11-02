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
                <div class="page-moderator__h1">Добавить урок</div>
                <form action="createLesson" method="POST" data-form="">
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
                        <select name="course_id" placeholder="Выберите курс" id="">
                          
                          <? foreach($allCourses as $item): ?>
                            <option value="<?=$item['id']?>"><?=$item['name']?></option>
                          <? endforeach; ?>
                        </select>
                      </div>

                      <div class="form__subitem">
                        <input type="text" name="length" placeholder="Продолжительность">
                      </div>

                    </div>

                    <div class="form__item">

                      <div class="form__subitem">
                        <select name="status" placeholder="Статус" id="">
                          <option value="1">Разблокирован</option>
                          <option value="0">Заблокирован</option>
                        </select>
                      </div>

                      <div class="form__subitem">
                            <label class="checkbox">
                              <input type="checkbox" name="stop" value="1"/>
                              <span class="checkbox__elem"></span>
                              <span class="checkbox__text">Стоп урок</span>
                            </label>
                      </div>

                    </div>

                    <div class="form__label">Содержание</div>

                     
                    <div class="form__item">
                      <div class="form__subitem">
                        
                            <div class="editor">
                              <div class="editor__aside">
                                <ul>
                                  <li>Заголовок</li>
                                  <li>Видео</li>
                                  <li>Спойлер</li>
                                  <li>Текст</li>
                                  <li>аудио</li>
                                  <li>Image</li>
                                </ul>
                              </div>
                              <div class="editor__content">

                              <div class="editor__block">
                                <div class="editor__block-remove">+</div>
                                <div class="editor-header">
                                  <input type="text" placeholder="Название заголовка">
                                </div>
                              </div>

                              <div class="editor__block">
                                <div class="editor__block-remove">+</div>
                                <div class="editor-video">
                                  <div class="editor-video__preview">
                                    <picture>
                                      <img src="" alt="">
                                    </picture>
                                  </div>

                                  <div class="editor-video__link">
                                    <input type="text" placeholder="Ссылка">
                                  </div>
                                  
                                </div>
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