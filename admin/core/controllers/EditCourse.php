<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/courses.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/lesson.php');

$courseData = getCourseData($_GET['id']);
$lessonCourse = getLessonList($_GET['id']);
$lessonCourseId = [];

foreach ($lessonCourse as $key => $item) {
    $lessonCourseId[$item['id']] = $item;
}

$lineupArray = json_decode($courseData['lineup'], true);

foreach ($lineupArray as $key => $item) {
    if ($item['type'] == 'lesson') {
        $lineupArray[$key]['name'] = $lessonCourseId[$item['id']]['name'];
    }
}

if (!$courseData['id']) {
    header('location: /admin/cp.php?view=course-list');
}
