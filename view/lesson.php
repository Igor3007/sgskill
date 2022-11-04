<div class="lesson">
                  <div class="lesson__details">
                    <div class="lesson__current">Урок 1 из 12</div>
                    <div class="lesson__stop">Необходимо выполнить задание</div>
                  </div>
                  <div class="lesson__content">
                    <div class="lesson-box">
                      
                      
                       <?foreach($lessonContent as $item):?>

                        <?=parseLesson($item)?>

                       <?endforeach;?>
                      
                       
                      
                    </div>
                  </div>
                  <div class="lesson__nav">
                    <div class="lesson__nav-prev"><a href="">
                        <button class="btn">Предыдущий урок</button></a></div>
                    <div class="lesson__nav-next"><a href="">
                        <button class="btn">Следующий урок</button></a></div>
                  </div>

                  <? if(false): ?>

                  <div class="lesson__title">Задание</div>
                  <div class="lesson__task">
                    <p>1. Ознакомьтесь с договором оферты, правилам Наставничества. </p>
                    <p>2. Для того, чтобы мозгу создать физическую награду за проделанную работу, очень важно поставить материальную цель. Напиши ниже, как ты себя порадуешь, когда достигнешь поставленного результата? Что себе купишь?</p>
                    <p>3. Заполни все поля внизу.</p>
                  </div>


                  <div class="lesson__comments">
                    <div class="box-comments">
                      <div class="box-comments__wrp">
                        <div class="box-comments__title">Ваш ответ </div>
                        <div class="box-comments__content">

                          <? if(!$taskReply['id']): ?>

                          <form action="/api/taskReply/" data-form="taskReply">
                          <div class="box-comments__add">
                            <div class="box-comments__textarea">
                              <textarea placeholder="Введите..." name="text"></textarea>
                            </div>
                            <div class="box-comments__send">
                              <button>
                                <svg width="24" height="24">
                                  <use xlink:href="/img/sprites/sprite.svg#ic_send"></use>
                                </svg>
                              </button>
                            </div>
                          </div>
                          </form>

                          <? else: ?>

                            <div class="lesson__task lesson__task--reply"><?=$taskReply['text']?></div>

                          <? endif; ?>  

                          <div class="box-comments__title">Коментарии </div>

                          <div class="box-comments__list">
                            <div class="item-message" data-comment="item" data-comment-id="123">
                              <div class="item-message__head">
                                <div class="item-message__photo"><span class="bgimage lazyload" data-bg="/img/common/user3.jpg"></span>
                                </div>
                                <div class="item-message__detail">
                                  <div class="item-message__name">Бронислав Андреев,</div>
                                  <div class="item-message__date">Сегодня в 19.30</div>
                                </div>
                              </div>
                              <div class="item-message__main"><span>Профессиональный военный Джексон Бриггс всеми силами пытается вернуться в строй, но из-за травмы головы получает постоянные отказы. Когда умирает один из его сослуживцев, Бриггсу дают задание: с военной базы в штате Вашингтон доставить на похороны в аризонский Ногалес боевую подругу почившего — нервную бельгийскую овчарку Лулу с целым спектром посттравматических расстройств.</span></div>
                              <div class="item-message__action" data-comment-action="container">
                                <div class="item-message__default" data-comment-action="pane-default"><span class="item-message__default-reply" data-comment-action="reply">Ответить</span></div>
                                <div class="item-message__reply" data-comment-action="pane-reply">
                                  <div class="item-message__reply-field">
                                    <textarea placeholder="Введите"></textarea>
                                  </div>
                                  <div class="item-message__reply-button" data-comment-action="send">
                                    <svg width="25" height="25">
                                      <use xlink:href="/img/sprites/sprite.svg#ic_send"></use>
                                    </svg>
                                  </div>
                                </div>
                              </div>
                              <div class="item-message__answers" data-comment="answers"> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <? endif; ?>

                </div>