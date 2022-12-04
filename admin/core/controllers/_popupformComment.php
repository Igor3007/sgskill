<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/core/models/comment.php');

$commentData = getCommentData([
    'id' => $_POST['comment_id']
]);

$id_comment = $commentData['id'];
$post_id = ($commentData['post_id'] ? $commentData['post_id'] : $_POST['post_id']);




?>

<div class="form-add-comment">
    <form action="">
        <div class="form">

            <div class="form__item">
                <div class="form__subitem">
                    <div class="form-image form-image--small">

                        <div class="form-image__cover form-image__cover--round active <?= (!empty($commentData['image']) ? ' cover--loaded' : '') ?> " data-image-upload="form">
                            <div class="form-image__btn">
                                <label class="attach-label"><span class="bgimage lazyload" data-bg="/img/common/camera.png"></span><span class="text-upload">Выбрать файл</span>
                                    <input type="file" name="image" data-attach="poster">
                                </label>
                            </div>
                            <div class="form-image__image form-image__image--round ">
                                <picture><img src="<?= getMediaURL($commentData['image'])['orig'] ?>" data-attach="preview-poster"></picture>
                            </div>
                        </div>



                    </div>
                </div>
            </div>


            <div class="form__item">
                <div class="form__subitem">
                    <input name="name" type="text" placeholder="Имя пользователя" value="<?= $commentData['name'] ?>">

                </div>
                <div class="form__subitem">
                    <input name="link" type="text" placeholder="Ссылка" value="<?= $commentData['link'] ?>">

                </div>
            </div>

            <div class="form__item">

                <div class="form__subitem">
                    <div class="two-checkbox">
                        <label class="checkbox">
                            <input type="radio" name="status" <?= ($commentData['status'] == '1' ? 'checked' : '') ?> <?= (empty($commentData['status']) ? 'checked' : '') ?> value="1">
                            <div class="checkbox__elem"></div>
                            <div class="checkbox__text">Разблокирован</div>
                        </label>
                        <label class="checkbox">
                            <input type="radio" name="status" <?= ($commentData['status'] == '0' ? 'checked' : '') ?> value="0">
                            <div class="checkbox__elem"></div>
                            <div class="checkbox__text">Заблокирован</div>
                        </label>
                    </div>
                </div>

                <div class="form__subitem">
                    <input type="text" value="<?= $commentData['date_create'] ?>" class="input-material--date input-datepicker" data-datepicker-lang="ru" name="date_create" placeholder="Дата">
                </div>

            </div>

            <div class="form__item">
                <div class="form__subitem">
                    <textarea name="text" placeholder="Коментарий" rows="5"><?= $commentData['text'] ?></textarea>
                </div>
            </div>

            <div class="form__item">
                <div class="form__subitem">
                    <input name="comment_id" type="hidden" value="<?= $id_comment ?>">
                    <input name="post_id" type="hidden" value="<?= $post_id ?>">
                    <button class="btn" type="submit">Cохранить</button>
                </div>
            </div>
        </div>
    </form>
</div>

<? exit(); ?>