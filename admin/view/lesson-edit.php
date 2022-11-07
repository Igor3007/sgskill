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
                <div class="page-moderator__h1">Редактировать урок</div>
                <form action="createLesson" method="POST" data-create-lesson="">
                  <div class="form">
                    <div class="form__item">
                      <div class="form__subitem">
                        <div class="form-image">

                          <div class="form-image__cover form-image__cover--round cover--loaded active" data-image-upload="form">
                            <div class="form-image__btn">
                              <label class="attach-label"><span class="bgimage lazyload" data-bg="/img/common/camera.png"></span><span class="text-upload">Выбрать файл</span>
                                <input type="file" name="image" data-attach="poster">
                              </label>
                            </div>
                            <div class="form-image__image form-image__image--round">
                              <picture><img src="<?=getMediaData($lessonData['preview'])['orig']?>" data-attach="preview-poster"></picture>
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
                        <input type="text" name="name" placeholder="Название курса" value="<?=$lessonData['name']?>">
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
                        <input type="text" name="length" placeholder="Продолжительность" value="<?=$lessonData['length']?>">
                      </div>

                    </div>

                    <div class="form__item">

                      <div class="form__subitem">
                        <select name="status" placeholder="Статус" id="" data-selected>
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
                                  <li data-editor-block="header" >Заголовок</li>
                                  <li data-editor-block="video" >Видео</li>
                                  <li data-editor-block="spoiler" >Спойлер</li>
                                  <li data-editor-block="text" >Текст</li>
                                  <li data-editor-block="audio" >аудио</li>
                                  <li data-editor-block="image" >Image</li>
                                </ul>
                              </div>
                              <div class="editor__content">

                                 <div class="editor__empty">
                                  Выберайте нужные блоки в левой части редактора и создайте ваш пост!
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