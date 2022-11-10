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
                <form action="createUser" method="POST" data-form="">
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
                    <div class="form__label">Личные данные</div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <input type="text" name="name" placeholder="Имя Фамилия">
                      </div>
                      <div class="form__subitem">
                        <input type="text" name="email" placeholder="Email">
                      </div>
                      <div class="form__subitem">
                        <input type="text" name="pass" placeholder="Пароль">
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <select placeholder="Страна" name="country">
                          <option value="ru" >Россия</option>
                          <option value="by" >Беларусь</option>
                          <option value="ua" >Украина</option>
                          <option value="kz" >Казахстан</option>
                        </select>
                      </div>
                      <div class="form__subitem">
                        <input type="text" placeholder="Город"  name="city">
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <select placeholder="Пол" name="sex">
                          <option value="0" >Мужской</option>
                          <option value="1" >Женсий</option>
                        </select>
                      </div>
                      <div class="form__subitem">
                        <select placeholder="Год" name="year">
                                <? for($i = 1980; $i <= 2022; $i++): ?>
                                  <? echo '<option '.($i == 1981 ? 'selected="selected"':'' ).' value="'.$i.'" >'.$i.'</option>';?>
                                <? endfor; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <select placeholder="Группа доступа" name="access">
                          <?=activeSelect($access, '0') ?>
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

                    <? if($allCourses): ?>

                      <? foreach($allCourses as $item): ?>
                        <div class="form__item">
                          <div class="form__subitem">
                            <label class="checkbox">
                              <input type="checkbox" name="courses[]" value="<?=$item['id']?>"/><span class="checkbox__elem"></span><span class="checkbox__text"><?=$item['name']?></span>
                            </label>
                          </div>
                        </div>
                    <? endforeach; ?>

                   <? else: ?>
                    <div>Курсы не найдены</div>
                   <? endif; ?>

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