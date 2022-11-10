<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/courses.php');

$allLesson = getLessonListAll();
$allCourses = getAllCourses();
$cousres = [];

foreach($allCourses as $item){
    $cousres[$item['id']] = $item;
}


?>

<div class="popup-select-lesson">
    <div class="popup-select-lesson__title">Добавить уроки</div>
    <div class="popup-select-lesson__find">
        <input type="text" placeholder="Найти урок" >
    </div>
    <div class="popup-select-lesson__list">
        <ul>

            <? foreach($allLesson as $item): ?>

                <li>
                    <label class="checkbox">
                        <input type="checkbox" name="courses[]" value="<?=$item['id']?>" data-name="<?=$item['name']?>" />
                        <span class="checkbox__elem"></span>
                        <span class="checkbox__text"><?='<strong>'.$item['name'].'</strong> - ( '.$cousres[$item['course_id']]['name'].' )' ?></span>
                    </label>
                </li>

            <? endforeach; ?>

        </ul>
    </div>

    <div class="popup-select-lesson__footer">
        <button class="btn btn-small" data-cle="addLessonFromPopup" >Добавить</button>
    </div>
</div>



<? exit(); ?>