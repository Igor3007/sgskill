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

    /* ===========================================
    video
    =========================================== */

    if (document.querySelectorAll('.video').length) {
        document.querySelectorAll('.video').forEach(item => {
            item.addEventListener('click', e => {

                let id = item.dataset.id.split('/')

                let iframe = document.createElement('iframe');
                iframe.setAttribute('src', 'https://kinescope.io/embed/' + id[id.length - 1] + '?autoplay=1')
                iframe.setAttribute('width', item.clientWidth + 'px')
                iframe.setAttribute('height', (item.clientHeight) + 'px')
                iframe.setAttribute('allowfullscreen', 'true')
                iframe.classList.add('play')

                item.innerHTML = '';
                item.append(iframe);

            })
        })
    }




})