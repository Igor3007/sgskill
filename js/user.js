document.addEventListener("DOMContentLoaded", function (event) {


    /* ========================================
    upload photo
    ======================================== */

    if (document.querySelector('[data-attach=photo]')) {
        document.querySelector('[data-attach=photo]').addEventListener('change', function () {

            let files = this.files;
            let elem = this;

            sendFiles(files, elem, function (dataImage) {

                elem.closest('form').querySelector('[data-attach="preview"]').style.backgroundImage = 'url(' + dataImage + ')'

            });

        })
    }


    function sendFiles(files, elem, callback) {


        for (var i = 0; i < files.length; i++) {
            var file = files.item(i);

            // проверяем размер файла
            if (file.size > 500000) {
                alert('Размер файла не должен превышать 500 kb')
                return false;
            }

            if (file.type === 'image/jpeg') {

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function (e) {
                    callback(e.target.result)
                }

            } else {
                alert('Допустимы только JPEG изображения ');
            }

        }
    }

    /* ========================================
    auth
    ======================================== */

    if (document.querySelector('[data-form="auth"]')) {

        let form = document.querySelector('[data-form="auth"]');

        form.addEventListener('submit', e => {
            e.preventDefault()

            let formData = new FormData(form);

            if (!formData.get('email') || !formData.get('password')) {
                window.STATUS.err('Все поля обязательны для заполнения')
            } else {
                window.ajax({
                    type: 'POST',
                    url: form.getAttribute('action'),
                    responseType: 'json',
                    data: formData,
                    btn: form.querySelector('[type="submit"]')
                }, function (status, response) {
                    if (response.status) {
                        window.STATUS.msg(response.msg)
                        window.location.href = response.location
                    } else {
                        window.STATUS.err(response.msg)
                    }
                })
            }

        })

    }
    /* ========================================
    profile
    ======================================== */

    if (document.querySelector('[data-form="profile"]')) {

        let form = document.querySelector('[data-form="profile"]');

        form.addEventListener('submit', e => {
            e.preventDefault()

            let formData = new FormData(form);

            window.ajax({
                type: 'POST',
                url: form.getAttribute('action'),
                responseType: 'json',
                data: formData,
                btn: form.querySelector('[type="submit"]')
            }, function (status, response) {
                if (response.status) {
                    window.STATUS.msg(response.msg)
                    //window.location.href = response.location
                } else {
                    window.STATUS.err(response.msg)
                }
            })

        })

    }

    /* ========================================
    data-form="taskReply"
    ======================================== */

    if (document.querySelector('[data-form="taskReply"]')) {

        let form = document.querySelector('[data-form="taskReply"]');

        form.addEventListener('submit', e => {
            e.preventDefault()

            let formData = new FormData(form);

            formData.set('lesson_id', window.location.href.split('/').slice(-1).pop())

            window.ajax({
                type: 'POST',
                url: form.getAttribute('action'),
                responseType: 'json',
                data: formData,
                btn: form.querySelector('.box-comments__send')
            }, function (status, response) {
                if (response.status) {
                    window.STATUS.msg(response.msg)
                    //window.location.href = response.location
                } else {
                    window.STATUS.err(response.msg)
                }
            })

        })

    }


    /* =====================================
    spoiler
    =====================================*/

    if (document.querySelector('.lesson-box__spoiler-btn')) {
        document.querySelectorAll('.lesson-box__spoiler-btn').forEach(item => {
            item.addEventListener('click', e => {

                let elText = e.target.closest('.lesson-box__spoiler').querySelector('.lesson-box__spoiler-text')
                elText.classList.toggle('open')
                item.innerHTML = (elText.classList.contains('open') ? 'Свернуть' : 'Показать полностью')

            })
        })
    }



    /* ===========================================
    input material
    =========================================== */

    function materialInput() {
        this.init = function () {

            let _this = this

            document.querySelectorAll('.input-material input').forEach(function (input) {

                if (input.value.length) {
                    input.setAttribute('area-valid', '')
                }

                _this.addEvent(input)
            })
        }

        this.addEvent = function (input) {
            input.addEventListener('keyup', function (event) {
                if (event.target.value.length) {
                    event.target.setAttribute('area-valid', 'true')
                } else {
                    event.target.removeAttribute('area-valid')
                }
            })
        }


    }


    const MATERIAL_INPUT = new materialInput()
    MATERIAL_INPUT.init()


    /* =================================================
    back timer for lesson
    =================================================*/

    if (document.querySelector('[data-timer-start]')) {

        function backOffsetTimer(elem) {

            var t = elem.dataset.timerStart.split(/[- :]/);

            // Array(6) [ "2022", "11", "14", "23", "57", "41" ]

            const deadline = new Date(Date.UTC(t[0], t[1] - 1, t[2], t[3], t[4], t[5]));
            deadline.setDate(deadline.getDate() + 7);

            let timerId = null;

            function declensionNum(num, words) {
                return words[(num % 100 > 4 && num % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][(num % 10 < 5) ? num % 10 : 5]];
            }

            function countdownTimer() {
                const diff = deadline - new Date();
                if (diff <= 0) {
                    clearInterval(timerId);
                }
                const days = diff > 0 ? Math.floor(diff / 1000 / 60 / 60 / 24) : 0;
                const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
                const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
                const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;
                $days.textContent = days < 10 ? '0' + days : days;
                $hours.textContent = hours < 10 ? '0' + hours : hours;
                $minutes.textContent = minutes < 10 ? '0' + minutes : minutes;
                $seconds.textContent = seconds < 10 ? '0' + seconds : seconds;
                $days.dataset.title = declensionNum(days, ['день', 'дня', 'дней']);
                $hours.dataset.title = declensionNum(hours, ['час', 'часа', 'часов']);
                $minutes.dataset.title = declensionNum(minutes, ['минута', 'минуты', 'минут']);
                $seconds.dataset.title = declensionNum(seconds, ['секунда', 'секунды', 'секунд']);
            }
            // получаем элементы, содержащие компоненты даты
            const $days = elem.querySelector('[data-timer="day"]');
            const $hours = elem.querySelector('[data-timer="hour"]');
            const $minutes = elem.querySelector('[data-timer="min"]');
            const $seconds = elem.querySelector('[data-timer="sec"]');
            // вызываем функцию countdownTimer
            countdownTimer();
            // вызываем функцию countdownTimer каждую секунду
            timerId = setInterval(countdownTimer, 1000);
        }

        document.querySelectorAll('[data-timer-start]').forEach(item => {
            backOffsetTimer(item)
        })

    }








})