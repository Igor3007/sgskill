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
                <div class="page-moderator__h1">Редактировать пользователя</div>


                 

                <form action="createUser" method="POST" data-user="form">
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
                            <div class="form-image__image form-image__image--round">
                              <picture><img src="<?=getMediaURL($userData['photo'])['orig']?>" data-attach="preview-poster"></picture>
                            </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                    <div class="form__label">Личные данные</div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <input type="text" name="name" placeholder="Имя Фамилия" value="<?=$userData['name']?>">
                      </div>
                      <div class="form__subitem">
                        <input type="text" name="email"  placeholder="Email" value="<?=$userData['email']?>">
                      </div>
                      <div class="form__subitem">
                        <input type="text" name="pass" placeholder="Пароль" value="">
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <select name="country" required="required" placeholder="Страна">
                          <?=activeSelect($country, $userData['country'])?>
                        </select>
                      </div>
                      <div class="form__subitem">
                        <input type="text" name="city" placeholder="Город" value="<?=$userData['city']?>">
                      </div>
                      
                    </div>
                    <div class="form__item">
                    <div class="form__subitem">
                        <select name="sex" required="required" placeholder="Пол">
                          <?=activeSelect($sex, $userData['sex'])?>
                        </select>
                      </div>
                      <div class="form__subitem">
                        <select name="year" required="required" placeholder="Год рождения">
                          <? for($i = 1980; $i <= 2022; $i++): ?>
                            <? echo '<option '.($i == $userData['year'] ? 'selected="selected"':'' ).' value="'.$i.'" >'.$i.'</option>';?>
                          <? endfor; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form__item">
                      <div class="form__subitem">
                        <select name="access" placeholder="Группа доступа" name="access">
                          <?=activeSelect($access, $userData['access']) ?>
                        </select>
                      </div>
                      <div class="form__subitem">
                        <select placeholder="Статус" name="status">
                        <?=activeSelect([
                            '1' => 'Разблокирован',
                            '0' => 'Заблокирован',
                          ], $userData['status'])?>

                        </select>
                      </div>
                    </div>
                    <div class="form__label">Доступные курсы</div>
                    

                      <? if($allCourses): ?>

                        <div class="course-list-user">

                        <? foreach($allCourses as $item): ?>

                          <div class="course-list-user__item" data-course-id="<?=$item['id']?>">
                            <div class="course-list-user__checkbox">
                              <label class="checkbox">
                                <input type="checkbox" name="courses[]" value="<?=$item['id']?>" <?=(in_array($item['id'], $userCourseId) ? 'checked':'')?> />
                                <span class="checkbox__elem"></span>
                                <span class="checkbox__text"><?=$item['name']?></span>
                              </label>
                            </div>
                            <div class="course-list-user__date">
                              <div class="course-list-user__start">
                                <input type="text" value="<?=($userCourseProps[$item['id']]['start'] ? $userCourseProps[$item['id']]['start'] : '')?>" data-course-date="start" data class="input-material--date input-datepicker" placeholder="Дата начала">
                              </div>  

                              <div class="sep" ></div>

                              <div class="course-list-user_end">
                                <input type="text" value="<?=($userCourseProps[$item['id']]['end'] ? $userCourseProps[$item['id']]['end'] : '')?>" data-course-date="end" data class="input-material--date input-datepicker" placeholder="Дата окончания"> 
                              </div>
                            </div>
                          </div>

                        <? endforeach; ?>

                        </div>
                        
                       

                      <? else: ?>
                        <div>Курсы не найдены</div>
                      <? endif; ?>

                      <br>
                      <br>
                    
                    <div class="form__item">
                      <div class="form__subitem">
                        <input type="hidden" name="user_id" value="<?=$_GET['id']?>">
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