<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/lesson.php');
 
$lesson_id = $route[2][0];

$lesson = getLessonData($lesson_id);
$taskReply = getTaskReplyData($lesson_id, $_SESSION['user']['id']);
 
 

$PAGE['h1'] = $lesson['name'];
$PAGE['BREADCRUMBS']['/user/cours/'.$lesson['course_id']] = 'Курс';

?>