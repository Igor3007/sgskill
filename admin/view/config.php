<main>
    <section class="section-page-moderator">
        <div class="container">
            <div class="page-moderator">
                <div class="page-moderator__aside">
                    <div class="moderator-aside">
                        <div class="moderator-aside__wrp">
                            <div class="moderator-aside__nav">
                                <? require_once($_SERVER['DOCUMENT_ROOT'] . '/admin/view/parts/left-bar.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-moderator__content">

                    <div class="page-moderator__main">
                        <div class="page-moderator__h1">Настройки</div>
                        <form action="changeConfig" method="POST" data-form="">
                            <div class="form config">


                                <div class="form__label">Верхнее меню</div>

                                <div class="form__item">
                                    <div class="form__subitem">
                                        <div class="config__name">Пункт меню </div>
                                        <div class="config__desc">Первый cлева </div>
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="menu[left][1][]" value="<?= $SETTING['menu']['left']['1'][0] ?>" placeholder="Название">
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="menu[left][1][]" value="<?= $SETTING['menu']['left']['1'][1] ?>" placeholder="Ссылка">
                                    </div>
                                </div>

                                <div class="form__item">
                                    <div class="form__subitem">
                                        <div class="config__name">Пункт меню</div>
                                        <div class="config__desc">Второй cлева </div>
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="menu[left][2][]" value="<?= $SETTING['menu']['left']['2'][0] ?>" placeholder="Название">
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="menu[left][2][]" value="<?= $SETTING['menu']['left']['2'][1] ?>" placeholder="Ссылка">
                                    </div>
                                </div>

                                <div class="form__item">
                                    <div class="form__subitem">
                                        <div class="config__name">Пункт меню</div>
                                        <div class="config__desc">Первый справа </div>
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="menu[right][1][]" value="<?= $SETTING['menu']['right']['1'][0] ?>" placeholder="Название">
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="menu[right][1][]" value="<?= $SETTING['menu']['right']['1'][1] ?>" placeholder="Ссылка">
                                    </div>
                                </div>

                                <div class="form__item">
                                    <div class="form__subitem">
                                        <div class="config__name">Пункт меню</div>
                                        <div class="config__desc">Второй справа </div>
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="menu[right][2][]" value="<?= $SETTING['menu']['right']['2'][0] ?>" placeholder="Название">
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="menu[right][2][]" value="<?= $SETTING['menu']['right']['2'][1] ?>" placeholder="Ссылка">
                                    </div>
                                </div>

                                <div class="form__label">Настройки шапки</div>

                                <div class="form__item">
                                    <div class="form__subitem">
                                        <div class="config__name">Текст лого</div>
                                        <div class="config__desc">основной</div>
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="header[logo-main]" value="<?= $SETTING['header']['logo-main'] ?>" placeholder="Текст">
                                    </div>

                                </div>

                                <div class="form__item">
                                    <div class="form__subitem">
                                        <div class="config__name">Текст лого</div>
                                        <div class="config__desc">дополнительный</div>
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="header[logo-sl]" value="<?= $SETTING['header']['logo-sl'] ?>" placeholder="Текст">
                                    </div>

                                </div>

                                <div class="form__label">Настройки футера</div>

                                <div class="form__item">
                                    <div class="form__subitem">
                                        <div class="config__name">Текст Сopyright</div>
                                    </div>
                                    <div class="form__subitem">
                                        <input type="text" name="footer[copyright]" value="<?= $SETTING['footer']['copyright'] ?>" placeholder="Текст">
                                    </div>

                                </div>


                                <br>
                                <br>
                                <div class="form__item">
                                    <div class="form__subitem"></div>
                                    <div class="form__subitem"></div>
                                    <div class="form__subitem">
                                        <button class="btn btn-full">Сохранить</button>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>