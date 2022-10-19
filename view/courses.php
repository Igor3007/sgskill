<div class="courses-block">
                  <div class="courses-block__list">

                  <?foreach($courses as $item):?>
                    <div class="courses-block__item">
                      <div class="card-cours">
                        <div class="card-cours__image">
                          <picture>
                            <img src="<?=getMediaURL($item['image'])['orig']?>" loading="lazy" alt="image"/>
                          </picture>
                        </div>
                        <div class="card-cours__main">
                          <div class="card-cours__title"><a href="/user/cours/<?=$item['id']?>"><?=$item['name']?></a></div>
                          <div class="card-cours__link"><?=$item['preview_text']?></div>
                          <div class="card-cours__desc">Доступ закончится через (21 день)</div>
                        </div>
                      </div>
                    </div>
                  <?endforeach;?>
                     
                  </div>
                </div>