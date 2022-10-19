<main>
    <section class="section-login-block">
    <div class="container">
        <div class="login-block">
        <div class="login-block__title">Вход</div>
        <div class="login-block__desc"> Пожалуйста введите свой логин и пароль для входа в личный кабинет</div>
        <div class="login-block__form">
            <form action="/api/auth/" data-form="auth" method="POST">
            <div class="form">
                <div class="form__item">
                <div class="form__subitem">
                    <input type="text" name="email" placeholder="Email"/>
                </div>
                </div>
                <div class="form__item">
                <div class="form__subitem">
                    <input type="password" name="password" placeholder="Пароль"/>
                </div>
                </div>
                <div class="form__item">
                <div class="form__subitem">
                    <button class="btn btn-full" type="submit">Войти в личный кабинет</button>
                </div>
                </div>
            </div>
            </form>
        </div>
        <div class="login-block__signup"><span>Нет личного аккаунта?</span><a href="/">Тогда вам сюда</a></div>
        </div>
    </div>
    </section>
</main>