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


    /* =========================================
    datepicker
    ========================================= */

    /* =========================================
    datepicker
    ========================================= */

    window.initDatepicker = function (input, option) {

        // input - input DOM elem

        if (!input.datepicker) {
            let datepicker = new Datepicker(input, {
                autohide: true,
                format: 'yyyy-mm-dd 00:00:00',
                language: (input.dataset.datepickerLang ? input.dataset.datepickerLang : 'ru')
            });

            if (option.autoShow) datepicker.show()

            input.addEventListener('changeDate', function (event) {
                if (event.target.value) {
                    input.setAttribute('area-valid', 'true')
                } else {
                    input.removeAttribute('area-valid')
                }
            })

            input.datepicker.picker.element.classList.add('picker-custom-offset');
        }
    }

    if (document.querySelector('[data-datepicker-lang]')) {
        (function () {
            Datepicker.locales.ru = {
                days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
                daysShort: ["Вск", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Суб"],
                daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
                today: "Сегодня",
                clear: "Очистить",
                format: "dd.mm.yyyy",
                weekStart: 1,
                monthsTitle: 'Месяцы'
            }
        })();
    }

    if (document.querySelector('.input-datepicker')) {

        document.querySelectorAll('.input-datepicker').forEach(function (input) {
            input.addEventListener('focus', function (event) {

                window.initDatepicker(input, {
                    autoShow: true
                })

            })
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

            //данные из редактора
            if (e.target.dataset.form == 'content' && window.editorInstanse) {
                formData.append('content', window.editorInstanse.getResulsJson())
            }

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

    /* ==========================================
    send user data
    ========================================== */

    if (document.querySelector('[data-user="form"]')) {

        document.querySelector('[data-user="form"]').addEventListener('submit', function (e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(this);
            let cousresProp = [];

            form.querySelectorAll('[data-course-id]').forEach(item => {

                let start = item.querySelector('[data-course-date="start"]').value
                let end = item.querySelector('[data-course-date="end"]').value

                cousresProp.push({
                    id: item.dataset.courseId,
                    start: (start ? start : 0),
                    end: (end ? end : 0)
                })
            })

            formData.append('props', JSON.stringify(cousresProp))

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


    /* ==========================================
    form create lesson
    ========================================== */
    if (document.querySelector('[data-create-lesson]')) {

        document.querySelector('[data-create-lesson]').addEventListener('submit', function (e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(this);

            formData.append('content', window.editorInstanse.getResulsJson())

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



    /* ==========================================
    create category blog
    ========================================== */
    if (document.querySelector('[data-popup-blog-catig]')) {

        document.querySelectorAll('[data-popup-blog-catig]').forEach(item => {
            item.addEventListener('click', function (event) {


                let popup = new customModal()
                let url = URL_API + 'formCatigBlog';

                let data = new FormData();

                data.append('id', event.target.dataset.popupBlogCatig)


                popup.open('<div>Loading...</div>', function (instanse) {

                    window.ajax({
                        type: 'POST',
                        data,
                        url: url,
                    }, function (status, response) {

                        popup.changeContent(response)
                        popup.modal.querySelector('form').addEventListener('submit', function (e) {

                            e.preventDefault()
                            let dataSend = new FormData(this);

                            window.ajax({
                                type: 'POST',
                                data: dataSend,
                                responseType: 'json',
                                url: URL_API + 'formCatigSave',
                            }, function (status, response) {
                                window.STATUS.msg(response.msg)
                                window.location.reload()
                                popup.close()
                            })

                        })


                    })
                })
            })

        })

    }

    //form edit course
    if (document.querySelector('[data-edit-course]')) {

        document.querySelector('[data-edit-course]').addEventListener('submit', function (e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(this);

            formData.append('lineup', window.cousreLessonEditorInstanse.getResulsJson())

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

    //remove element

    if (document.querySelector('[data-remove]')) {

        document.querySelectorAll('[data-remove]').forEach(item => {




            item.addEventListener('click', function () {

                let data = new FormData();
                let elem = item;

                if (!confirm('Вы действительно хотите удалить ?')) return false;

                data.append('action', elem.dataset.remove)
                data.append('id', elem.dataset.removeId)

                window.ajax({
                    type: 'POST',
                    url: URL_API + 'remove',
                    responseType: 'json',
                    data,
                    btn: false,

                }, function (status, response) {
                    if (response.status) {
                        window.STATUS.msg(response.msg)

                        if (response.reload) {
                            window.location.reload()
                        }

                    } else {
                        window.STATUS.err(response.msg)
                    }
                })

            })
        })



    }

    /* ==================================================
    sort lesson in cousre
    ==================================================*/

    if (document.querySelector('.lesson-list')) {



        class cousreLessonEditor {
            constructor(params) {
                this.$el = (params.elem ? document.querySelector(params.elem) : false)

                this.addEvent()
            }

            addEvent() {
                this.$el.querySelector('[data-cle="addSeparator"]').addEventListener('click', e => {
                    this.appendItem({
                        type: 'separator',
                        name: ''
                    })
                })
            }

            createLesson(data) {
                const template = `
                <span class="sort-handler"></span> 
                <span class="lesson-list-item"> ${data.name}</span>
                <span class="ic_remove" ></span>
            `;

                const elem = document.createElement('li');

                elem.innerHTML = template;
                elem.dataset.type = 'lesson'
                elem.dataset.id = data.id

                elem.querySelector('.ic_remove').addEventListener('click', e => e.target.closest('li').remove())

                return elem
            }

            createSeparator(data) {
                const template = `
                <span class="sort-handler"></span> <span class="lesson-list-separator"> 
                <input type="text" placeholder="Название главы" value="${data.name}"></span>
                <span class="ic_remove" ></span>
            `;

                const elem = document.createElement('li')
                elem.innerHTML = template;
                elem.dataset.type = 'separator'

                elem.querySelector('.ic_remove').addEventListener('click', e => e.target.closest('li').remove())

                return elem
            }

            initSortable() {
                new Sortable(document.querySelector('.lesson-list__list ul'), {
                    animation: 150,
                    handle: '.sort-handler',
                    direction: 'vertical'
                });
            }

            appendItem(item) {

                const container = this.$el.querySelector('.lesson-list__list ul')

                switch (item.type) {
                    case 'lesson':
                        container.append(this.createLesson(item));
                        break;
                    case 'separator':
                        container.append(this.createSeparator(item));
                        break;

                    default:
                        console.err('No selected type element')
                }

            }

            loadList(json) {

                const arrayData = JSON.parse(json);

                arrayData.forEach(item => {
                    this.appendItem(item)
                })

                this.initSortable()

            }

            getResulsJson() {

                const arr = [];

                this.$el.querySelectorAll('[data-type]').forEach(item => {

                    function getName(item) {
                        if (item.dataset.type == 'lesson') return item.querySelector('.lesson-list-item').innerText
                        if (item.dataset.type == 'separator') return item.querySelector('[type="text"]').value
                    }

                    arr.push({
                        type: item.dataset.type,
                        id: item.dataset.id,
                        name: getName(item),
                    })
                })

                return JSON.stringify(arr)
            }
        }



        window.cousreLessonEditorInstanse = new cousreLessonEditor({
            elem: '.lesson-list'
        })

        if (LOAD_SJON) {
            window.cousreLessonEditorInstanse.loadList(LOAD_SJON);
        }
    }






    /* ============================================
    popup select lesson
    ============================================*/

    if (document.querySelector('[data-cle="addLesson"]')) {

        document.querySelector('[data-cle="addLesson"]').addEventListener('click', function (event) {



            let selectLesson = new customModal()
            let url = URL_API + 'getLessons';


            selectLesson.open('<div>Loading...</div>', function (instanse) {

                window.ajax({
                    type: 'GET',
                    url: url,
                }, function (status, response) {

                    selectLesson.changeContent(response)

                    selectLesson.modal.querySelector('[data-cle="addLessonFromPopup"]').addEventListener('click', function (e) {

                        const containerUL = selectLesson.modal.querySelector('.popup-select-lesson__list ul')
                        const resultArray = [];

                        containerUL.querySelectorAll('[type="checkbox"]').forEach(input => {
                            if (input.checked) {
                                resultArray.push({
                                    type: 'lesson',
                                    id: input.value,
                                    name: input.dataset.name
                                })
                            }
                        })

                        window.cousreLessonEditorInstanse.loadList(JSON.stringify(resultArray));


                        selectLesson.close()


                    })
                })
            })
        })

    }

















});