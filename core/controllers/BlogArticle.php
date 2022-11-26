<?php

function parseLesson($item)
{


    switch ($item['type']) {

        case 'header':

            return '<div class="post-box__header">
                <h2>' . $item['text'] . '</h2>
            </div>';

            break;
        case 'video':

            return '
                <div class="post-box__video">
                    <div class="video" data-id="' . $item['link'] . '">
                        <div class="video__preview">
                        <picture>
                            <img src="' . $item['image'] . '" loading="lazy" alt="image"/>
                        </picture>
                        </div>
                        <div class="video__action">
                            <div class="video__button">
                                <svg width="70" height="70">
                                <use xlink:href="/img/sprites/sprite.svg#ic_play"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            ';

            break;
        case 'spoiler':

            return '
            
            <div class="post-box__spoiler">
                <div class="post-box__spoiler-text"> ' . nl2br($item['text']) . ' </div>
                <div class="post-box__spoiler-btn">Показать полностью </div>
            </div>

            ';

            break;

        case 'text':

            return ' <div class="post-box__text">' . nl2br($item['text']) . '</div> ';

            break;

        case 'task':

            return ' <div class="post-box__task">
                        <div class="post__task">
                            ' . ($item['header'] ? '<div class="post__title">' . $item['header'] . '</div>' : '') . '
                            ' . ($item['text'] ? '<div class="post__text">' . nl2br($item['text']) . '</div>' : '') . '
                        </div>
                    </div> ';

            break;

        case 'link':

            return ' <div class="post-box__link">
                        <div class="post__link">
                            <div class="post__link-icon">
                                <span class="ic_chain" ></span>
                            </div>
                            <div class="post__link-main">
                                <div class="post__link-text">' . $item['name'] . '</div>
                                <div class="post__link-url">' . parse_url($item['url'])['host'] . '</div>

                                <div class="post__link-url">
                                    <a href="' . $item['url'] . '" target="_blank" rel="noopener noreferrer">' . $item['name'] . '</a>
                                </div>
                            </div>
                            
                           
                             
                        </div>
                    </div> ';

            break;

        case 'audio':

            return '
                <div class="post-box__audio">
                    <audio controls="" src="' . $item['link'] . '"></audio>
                </div>
            ';

            break;

        case 'file':

            return '
                <div class="post-box__file">
                    <div class="post-box__inner">
                        <div class="post-box__file-icon">
                            <span class="ic_download" ></span>
                        </div>
                        <div class="post-box__file-name">' . $item['header'] . '</div>
                        <div class="post-box__file-link">
                            <a target="_blank" href="' . $item['text'] . '" download="" title=" Скачать ' . $item['header'] . ' " >Скачать</a>
                        </div>
                    </div>
                </div>
            ';

            break;

        case 'image':


            $gallery = '';
            $gallery_id = preg_replace("/[^,.0-9]/", '', md5($item['image'][0]['url']));

            foreach ($item['image'] as $img) {
                $gallery .= '<div class="post-box__item">
                                <a href="' . $img['url'] . '" data-fancybox="gallery-' . $gallery_id . '">
                                    <picture> <img src="' . $img['url'] . '" alt="" srcset=""> </picture>
                                </a>
                            </div>';
            }

            return '
                <div class="post-box__image">
                    <div class="post-box__wrp">' . $gallery . '</div>
                </div>
            ';

            break;
    }
}


$post_alias = htmlspecialchars($route[2][0]);

$data = getArticleData(
    ['alias' => $post_alias]
);

$postContent = json_decode($data['content'], true);
