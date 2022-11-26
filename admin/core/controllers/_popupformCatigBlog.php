<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/core/models/blog.php');

$allCategories = getAllCategories(false);
$id_catig = $_POST['id'];
$name;

foreach($allCategories as $item) {
    if($item['id'] == $id_catig){
        $name = $item['name'];
    }
}

?>

<div class="form-add-catig">
    <form action="">
        <div class="form">
            <div class="form__label">Название категории</div>

            <div class="form__item">
                <div class="form__subitem">
                    <input name="name" type="text" placeholder="Введите" value="<?=$name?>">
                    <input name="id" type="hidden"  value="<?=$id_catig?>">
                </div>
            </div>

            <div class="form__item">
                <div class="form__subitem">
                    <button class="btn" type="submit" >Cохранить</button>
                </div>
            </div>
        </div>
    </form>
</div>

<? exit(); ?>