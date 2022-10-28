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
                   
                  <li><a href="#">Удалить</a></li>
                   
                </ul>
              </div>
              <div class="page-moderator__main">
                <div class="page-moderator__h1">Добавить пользователя</div>
                <form action="#" method="POST">
                  <div class="form">
                    <div class="form__item">
                      <div class="form__subitem">
                                        <div class="form-image">
                                          <div class="form-image__cover form-image__cover--round active" data-image-upload="form">
                                            <div class="form-image__btn">
                                              <label class="attach-label"><span class="bgimage lazyload" data-bg="/img/common/camera.png"></span><span class="text-upload">Выбрать файл</span>
                                                <input type="file" name="poster-img" data-attach="poster">
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
                    <div class="form__label">Личные данные</div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <input type="text" placeholder="Имя Фамилия">
                      </div>
                      <div class="form__subitem">
                        <input type="text" placeholder="Email">
                      </div>
                      <div class="form__subitem">
                        <input type="text" placeholder="Пароль">
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <select placeholder="Страна">
                          <option>Выбрать</option>
                        </select>
                      </div>
                      <div class="form__subitem">
                        <select placeholder="Пол">
                          <option>Выбрать</option>
                        </select>
                      </div>
                      <div class="form__subitem">
                        <select placeholder="Год">
                          <option>Выбрать</option>
                        </select>
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <select placeholder="Группа доступа">
                          <option>Пользователь</option>
                          <option>Администратор</option>
                          <option>Модератор</option>
                        </select>
                      </div>
                      <div class="form__subitem">
                        <select placeholder="Статус">
                          <option>Разблокирован</option>
                          <option>Заблокирован</option>
                        </select>
                      </div>
                    </div>
                    <div class="form__label">Доступные курсы</div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <label class="checkbox">
                          <input type="checkbox" name="undefined"/><span class="checkbox__elem"></span><span class="checkbox__text">Наставничество</span>
                        </label>
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <label class="checkbox">
                          <input type="checkbox" name="undefined"/><span class="checkbox__elem"></span><span class="checkbox__text">Наставничество</span>
                        </label>
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <label class="checkbox">
                          <input type="checkbox" name="undefined"/><span class="checkbox__elem"></span><span class="checkbox__text">Наставничество</span>
                        </label>
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <label class="checkbox">
                          <input type="checkbox" name="undefined"/><span class="checkbox__elem"></span><span class="checkbox__text">Наставничество</span>
                        </label>
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <label class="checkbox">
                          <input type="checkbox" name="undefined"/><span class="checkbox__elem"></span><span class="checkbox__text">Наставничество</span>
                        </label>
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem"></div>
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