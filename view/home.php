<main>
<section class="section-blog">
              <div class="container">
                <div class="blog">
                <div class="blog__nav">
                  <ul class="slide-menu">
                    <li><a href="#">Новые</a></li>
                    <li><a href="#">Свадьба</a></li>
                    <li><a href="#">Под водой</a></li>
                    <li class="sliding-line"></li>
                  </ul>
                </div>
                <div class="blog__list">

                <? foreach([1,1,1,1,1,1] as $item): ?>

                  <div class="blog__item">
                          <div class="blog-post">
                            <div class="blog-post__image">
                              <picture>
                                <source srcset="/img/common/mc_63172eb75f0eb.webp" type="image/webp"/><img src="/img/common/mc_63172eb75f0eb.jpg" loading="lazy" alt="image"/>
                              </picture><a href="/blog/article/"><span class="ic_eye" style="background-image: url('/img/view.svg')"></span></a>
                            </div>
                            <div class="blog-post__main">
                              <div class="blog-post__tags">
                                <ul>
                                  <li><a href="#">#Свадьба </a></li>
                                  <li><a href="#">#Сентябрь </a></li>
                                  <li><a href="#">#Осень </a></li>
                                  <li><a href="#">#Тематика </a></li>
                                  <li><a href="#">#ВыезднаяРегистрация </a></li>
                                  <li><a href="#">#Церемония </a></li>
                                  <li><a href="#">#уВоды</a></li>
                                </ul>
                              </div>
                              <div class="blog-post__title"><a href="/blog/article/">Хотите рассказать о компании или продукте?</a></div>
                              <div class="blog-post__desc">Свадьба двух голливудских улыбок</div>
                            </div>
                          </div>
                  </div>

                  <? endforeach; ?>
                   
                </div>
                <div class="blog__pagination">
                  <button class="btn">Показать еще</button>
                </div>
              </div>
              </div>
            </section>
</main>