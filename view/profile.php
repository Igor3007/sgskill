<div class="profile-block">
              <div class="profile-block__form">
                <form method="POST" action="/api/userUpdate" data-form="profile">
                  <div class="profile-block__photo">
                    <div class="box-photo">
                      <div class="box-photo__image"><span class="bgimage lazyload" data-attach="preview" data-bg="<?=getMediaURL($dataUser['photo'])['orig']?>"></span></div>
                      <div class="box-photo__add">
                        <label class="attach-text">
                          <input type="file" data-attach="photo" name="photo"/><span>Изменить фото</span>
                           
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="profile-block__fields">
                    <div class="form">
                      <div class="form__item">
                        <div class="form__subitem">
                          <div class="input-material">
                            <input type="text" name="name" value="<?=$dataUser['name']?>"/>
                            <label>Имя</label>
                          </div>
                        </div>
                        
                      </div>
                      <div class="form__item">
                        <div class="form__subitem">
                          <select name="country" required="required" placeholder="Страна">
                            <?=activeSelect($country, $dataUser['country'])?>
                          </select>
                        </div>
                        <div class="form__subitem">
                          <div class="form__item">
                            <div class="form__subitem">
                              <select name="year" required="required" placeholder="Год рождения">
                                <? for($i = 1980; $i <= 2022; $i++): ?>
                                  <? echo '<option '.($i == $dataUser['year'] ? 'selected="selected"':'' ).' value="'.$i.'" >'.$i.'</option>';?>
                                <? endfor; ?>
                              </select>
                            </div>
                            <div class="form__subitem">
                              <select name="sex" required="required" placeholder="Пол">
                                <?=activeSelect($sex, $dataUser['sex'])?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form__item">
                        <div class="form__subitem">
                          <div class="input-material">
                            <input type="email" name="email" value="<?=$dataUser['email']?>"/>
                            <label>Email</label>
                          </div>
                        </div>
                        <div class="form__subitem"> </div>
                      </div>
                      <div class="form__label">Пароль</div>
                      <div class="form__item">
                        <div class="form__subitem">
                          <input type="password"  placeholder="Пароль" name="password"/>
                        </div>
                        <div class="form__subitem">
                          <input type="password"  placeholder="Повторите пароль" name="passwordRepeat"/>
                        </div>
                      </div>
                      <div class="form__item">
                        <div class="form__subitem">
                          <button class="btn" type="submit">Сохранить изменения</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>