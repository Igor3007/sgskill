document.addEventListener('DOMContentLoaded', function (event) {

    const URL_API = '/admin/cp.php?view=rest&method='

    /* ========================================
    dot menu
    ========================================*/

    if (document.querySelector('[data-menu=dots]')) {

        //click menu
        document.querySelectorAll('[data-menu=dots]').forEach(function (item) {
            item.addEventListener('click', function (event) {
                item.classList.toggle('open')
            })

        });

        //out click
        document.addEventListener('click', function (event) {

            if (!event.target.closest('.ob-menu')) {
                if (document.querySelector('.ob-menu.open')) {
                    document.querySelector('.ob-menu.open').classList.remove('open')
                }
            }

        })

    }




    /* =====================================
    sendFiles
    =====================================*/

    function sendFiles(files, elem, callback) {


        for (var i = 0; i < files.length; i++) {
            var file = files.item(i);

            // проверяем размер файла
            if (file.size > 1200000) {
                alert('Размер файла не должен превышать 1 мб')
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

    if (document.querySelector('[data-attach=poster]')) {
        document.querySelectorAll('[data-attach=poster]').forEach(function (poster) {
            poster.addEventListener('change', function () {

                let files = this.files;
                let elem = this;

                sendFiles(files, elem, function (dataImage) {

                    elem.closest('[data-image-upload="form"]').classList.add('cover--loaded')
                    elem.closest('[data-image-upload="form"]').querySelector('[data-attach="preview-poster"]').src = dataImage

                });

            })
        })
    }



    /* ===========================================
    tabs
    =========================================== */

    document.querySelectorAll('[data-tab-nav] a').forEach(function (item) {

        item.addEventListener('click', function () {

            if (document.querySelector('[data-tab-nav] li.active')) {
                document.querySelector('[data-tab-nav] li.active').classList.remove('active')
            }

            item.parentNode.classList.add('active')

            document.querySelectorAll('[data-tab-item]').forEach(function (tab) {
                if (item.getAttribute('href') == '#' + tab.dataset.tabItem) {
                    tab.classList.add('active')
                } else {
                    tab.classList.remove('active')
                }
            })

            document.querySelectorAll('[data-lang]').forEach(function (lang) {

                let href = item.getAttribute('href').replace('#', '')

                if (lang.dataset.lang.indexOf(href) !== -1) {
                    lang.classList.add('active')

                } else {
                    lang.classList.remove('active')

                    console.log(lang)
                }
            })



            if (!document.querySelectorAll('[data-lang].active').length) {
                document.querySelector('[data-lang]').classList.add('active')
            }


        })
    })



    /* ==========================================
    suggest input
    ========================================== */



    function inputSuggest(option) {

        this.option = option
        this.elem = option.elem
        this.list = document.createElement('ul');

        this.init = function () {
            this.createSuggestList()
            this.addEvent()
        }

        this.createSuggestList = function () {


            let _this = this

            this.loadSuggestElem(this.elem.dataset.url, function (arr) {

                _this.list.querySelectorAll('li').forEach((removeItem) => {
                    removeItem.remove()
                })

                arr.forEach((item) => {
                    let li = document.createElement('li')
                    li.innerText = item.text
                    li.setAttribute('rel', item.value)

                    _this.eventListItem(li)
                    _this.list.append(li)
                })
            })

            this.list.classList.add('suggest-list')

            this.mountList()

        }

        this.mountList = function () {
            this.elem.parentNode.append(this.list)
        }

        this.loadSuggestElem = function (url, callback) {
            window.ajax({
                type: 'GET',
                responseType: 'json',
                url: url
            }, function (status, response) {
                callback(response)
            })
        }

        this.changeInput = function (event) {

            let value = event.target.value.toLowerCase()

            if (true) {

                this.list.style.display = 'initial'

                this.list.querySelectorAll('li').forEach(function (li) {

                    if (li.classList.contains('hide')) {
                        li.classList.remove('hide')
                    }

                    if (li.innerText.toLowerCase().indexOf(value) == -1 && value.length) {
                        li.classList.add('hide')
                    }
                })

                //update list
                this.mountList()
            }
        }

        this.closeList = function () {
            this.list.style.display = 'none'

            if (!this.elem.value.length) {
                this.elem.removeAttribute('area-valid')
                this.option.on.change('', false)
            }

        }
        this.openList = function () {
            this.list.style.display = 'block'
            this.elem.setAttribute('area-valid', true)
            this.createSuggestList()
        }

        this.addEvent = function () {
            this.elem.addEventListener('keyup', (event) => {
                this.changeInput(event)
            })
            this.elem.addEventListener('focus', (event) => {
                this.openList()
            })
            document.addEventListener('click', () => {
                this.closeList()
            })
            this.elem.addEventListener('click', (event) => {
                event.stopPropagation()
            })
        }

        this.eventListItem = function (li) {
            li.addEventListener('click', (event) => {
                this.elem.setAttribute('area-valid', true)
                this.elem.value = event.target.innerText
                this.closeList()

                this.option.on.change(event.target.innerText, event.target.getAttribute('rel'))
            })
        }

    }

    if (document.querySelectorAll('.input-suggest')) {
        document.querySelectorAll('.input-suggest').forEach(function (input) {

            let instanse = new inputSuggest({
                elem: input,
                on: {
                    change: function (text, value) {

                        if (document.querySelector('.card-director-edit')) {
                            let elem = document.querySelector('.card-director-edit')
                            let link = elem.dataset.ajax

                            if (text || value) {
                                elem.setAttribute('data-url', link.replace('$id', value))
                            } else {
                                elem.removeAttribute('data-url')
                            }

                        }

                    }
                }
            });
            instanse.init()

        })
    }


    /* ==========================================
    send form
    ========================================== */

    if (document.querySelector('[data-form]')) {

        document.querySelector('[data-form]').addEventListener('submit', function (e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(this);

            console.log(formData)

            window.ajax({
                type: 'POST',
                url: URL_API + form.getAttribute('action'),
                responseType: 'json',
                data: formData,
                btn: form.querySelector('[type="submit"]')
            }, function (status, response) {
                if (response.status) {
                    window.STATUS.msg(response.msg)

                } else {
                    window.STATUS.err(response.msg)
                }
            })

        })

    }















});