<?php
 
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/media.php');

 
$lessonData = getLessonData($_GET['id']);
$allCourses = getAllCourses();

if(!$lessonData['id']){
    header('location: /admin/cp.php?view=lesson-list');
}

$arraySelect  = [];

foreach($allCourses as $item) {
    $arraySelect[ $item['id'] ] = $item['name'];
}



function createBlockEditor($block){

    switch($block['type']){


        case 'file': 

            return '<div class="editor__block" data-content-block="file"> 
             
            <div class="editor__block-remove">+</div>
            <div class="editor__block-handle"></div>
             <div>
                <div class="editor-file">
                    <div class="editor-file__field">
                        <input type="text" data-file-link="header" placeholder="Заголовок" value="'.$block['header'].'">
                    </div>

                    <div class="editor-file__field">
                        <input type="text" data-file-link="file" value="'.$block['text'].'" placeholder="Ссылка на файл">
                        <label class="attach-link">
                            <input type="file" name="file-editor">
                            <span class="ic_upload"></span>
                        </label>
                    </div>
                </div>
            </div></div>';

        break;
        case 'task': 

            return '<div class="editor__block" data-content-block="task"> 
             
            <div class="editor__block-remove">+</div>
            <div class="editor__block-handle"></div>
             <div>
                <div class="editor-text">
                    <input type="text" data-task="header" placeholder="Заголовок " value="'.$block['header'].'"> 
                    <textarea data-task="text" placeholder="Описание задачи">'.$block['text'].'</textarea>
                </div>
            </div></div>';

        break;
        case 'spoiler': 

            return '<div class="editor__block" data-content-block="spoiler"> 
             
            <div class="editor__block-remove">+</div>
            <div class="editor__block-handle"></div>
             <div>
                <div class="editor-spoiler">
                    <textarea type="text" placeholder="Текст со спойлером">'.$block['text'].'</textarea>
                </div>
            </div></div>';

        break;
        case 'text': 

            return '<div class="editor__block" data-content-block="text"> 
             
            <div class="editor__block-remove">+</div>
            <div class="editor__block-handle"></div>
             <div>
                <div class="editor-text">
                    <textarea type="text" placeholder="Текстовый блок">'.$block['text'].'</textarea>
                </div>
            </div></div>';

        break;
        case 'audio': 

            return '<div class="editor__block" data-content-block="audio"> 
             
            <div class="editor__block-remove">+</div>
            <div class="editor__block-handle"></div>
             <div>
            <div class="editor-audio">
                <div class="editor-audio__field">
                    <input type="text" data-file-link="file" value="'.$block['link'].'" placeholder="Ссылка на mp3">
                    <label class="attach-link">
                        <input type="file" name="file-editor">
                        <span class="ic_upload"></span>
                    </label>
                </div>
            </div>
            </div></div>';

        break;

        case 'header': 

            return '<div class="editor__block" data-content-block="header"> 
                        <div class="editor__block-remove">+</div>
                        <div class="editor__block-handle"></div>
                        <div>
                            <div class="editor-header">
                                <input type="text" placeholder="Название заголовка" value="'.$block['text'].'">
                            </div>
                        </div>
                    </div>';

        break;

        case 'video': 

            return '<div class="editor__block" data-content-block="video"> 
             
            <div class="editor__block-remove">+</div>
            <div class="editor__block-handle"></div>
             <div>
                <div class="editor-video">
                    <div class="editor-video__preview">
                        <picture>
                            <img src="'.$block['image'].'" data-upload-src="'.$block['image'].'" alt="">
                            <label class="attach-file-editor">
                                <input type="file" name="file-editor">
                                <span> <i class="ic_upload"></i> Выбрать файл </span>
                            </label>
                        </picture>
                    </div>
                    <div class="editor-video__link">
                        <input type="text" placeholder="Ссылка" value="'.$block['link'].'">
                    </div>
                </div>
            </div>
            </div>';

        break;


        case 'image': 

            $gallery = '';

            foreach ($block['image'] as $img){
                $gallery .= '
                <picture>
                    <img data-upload-src="'.$img['url'].'" src="'.$img['url'].'" alt=""> 
                    <span class="egallery-remove">+</span>
                </picture> ';
            }

            return '<div class="editor__block" data-content-block="image"> 
             
            <div class="editor__block-remove">+</div>
            <div class="editor__block-handle"></div>

             <div>
            <div class="editor-gallery">
                <div class="editor-gallery__images">
                    '.$gallery.'
                </div>

                <div class="editor-gallery__action">
                    <label class="attach-file-editor">
                    <input type="file" name="file-editor">
                    <span> Добавить файл </span>
                    </label>
                </div>
            </div>
            </div></div>';

        break;


    }




}



?>