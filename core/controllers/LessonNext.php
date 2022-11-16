<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
 
$lesson_id = $route[2][0];

$NEXT_LESSON = getNextLesson($lesson_id);
$CurrentlessonProp = getLessonProps($lesson_id, $_SESSION['user']['id']);

//debug($CurrentlessonProp);

if($CurrentlessonProp['state'] == 'completed' && $_SESSION['user']['access'] > 1) {
    exit(header('location: /user/lesson/'.$NEXT_LESSON['next']['props']['id'])); 
}

if($NEXT_LESSON['current']['props']){
    $updateCurrent = mysql_update_array('sll_lesson-props', [
        'state' => 'completed'
    ], [
        'lesson_id' => $lesson_id,
        'user_id'   => $_SESSION['user']['id']
    ]);
}

if($NEXT_LESSON['next']['props']){
    $updateNext = mysql_insert_array('sll_lesson-props', [
        'state' => 'active',
        'lesson_id' => $NEXT_LESSON['next']['props']['id'],
        'user_id'   => $_SESSION['user']['id'],
        'course_id' => $NEXT_LESSON['next']['data']['course_id']
    ]);
}

if($updateNext['status'] && $updateCurrent['status']){
    exit(header('location: /user/lesson/'.$NEXT_LESSON['next']['props']['id']));
}else {
    debug($updateNext);
    debug($updateCurrent);
}

 

 

 
 
 
 
?>