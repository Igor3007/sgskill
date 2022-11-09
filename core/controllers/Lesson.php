<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
 
$lesson_id = $route[2][0];

$lesson = getLessonData($lesson_id);
$taskReply = getTaskReplyData($lesson_id, $_SESSION['user']['id']);

$lessonContent = json_decode($lesson['content'], true);

function parseLesson($item){


    switch($item['type']){

        case 'header':
            
            return '<div class="lesson-box__header">'.$item['text'].'</div>';
            
            break;
        case 'video':
            
            return '
                <div class="lesson-box__video">
                    <div class="video" data-id="'.$item['link'].'">
                        <div class="video__preview">
                        <picture>
                            <img src="'.$item['image'].'" loading="lazy" alt="image"/>
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
            
            <div class="lesson-box__spoiler">
                <div class="lesson-box__spoiler-text"> '.nl2br($item['text']).' </div>
                <div class="lesson-box__spoiler-btn">Показать полностью </div>
            </div>

            ';
            
            break;

        case 'text':
            
            return ' <div class="lesson-box__text">'.nl2br($item['text']).'</div> ';
            
            break;

        case 'task':
            
            return ' <div class="lesson-box__task">
                        <div class="lesson__task">
                            '.($item['header'] ? '<div class="lesson__title">'.$item['header'].'</div>':'').'
                            '.($item['text'] ? '<div class="lesson__text">'.nl2br($item['text']).'</div>':'').'
                        </div>
                    </div> ';
            
            break;

        case 'audio':
            
            return '
                <div class="lesson-box__audio">
                    <audio controls="" src="'.$item['link'].'"></audio>
                </div>
            ';
            
            break;

        case 'file':
            
            return '
                <div class="lesson-box__file">
                    <div class="lesson-box__wrp">
                        <div class="lesson-box__file-icon">
                            <span class="ic_download" ></span>
                        </div>
                        <div class="lesson-box__file-name">'.$item['header'].'</div>
                        <div class="lesson-box__file-link">
                            <a href="'.$item['text'].'" download="" title=" Скачать '.$item['header'].' " >Скачать</a>
                        </div>
                    </div>
                </div>
            ';
            
            break;

        case 'image':

            $gallery = '';

            foreach ($item['image'] as $img){
                $gallery .= '<div class="lesson-box__item">
                                <a href="http://">
                                    <picture> <img src="'.$img['url'].'" alt="" srcset=""> </picture>
                                </a>
                            </div>';
            }
            
            return '
                <div class="lesson-box__image">
                    <div class="lesson-box__wrp">'.$gallery.'</div>
                </div>
            ';
            
            break;

    }


}
 
 

$PAGE['h1'] = $lesson['name'];
$PAGE['BREADCRUMBS']['/user/cours/'.$lesson['course_id']] = 'Курс';

?>