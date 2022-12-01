document.addEventListener("DOMContentLoaded", function (event) {




    /* ==============================================
    change default fancubox
    ============================================== */

    if (window.Fancybox != undefined) {
        Fancybox.bind("[data-fancybox]", {
            infinite: false,
            Thumbs: {
                autoStart: false,
            },
            Toolbar: {
                display: [
                    //"zoom",
                    //"slideshow",
                    "fullscreen",
                    "download",
                    //"thumbs",
                    "close",
                ],
            },
        });
    }


    /* ==============================================
    mobile menu
    ============================================== */

    function Status() {

        this.containerElem = '#status'
        this.headerElem = '#status_header'
        this.msgElem = '#status_msg'
        this.btnElem = '#status_btn'
        this.timeOut = 10000,
            this.autoHide = true

        this.init = function () {
            let elem = document.createElement('div')
            elem.setAttribute('id', 'status')
            elem.innerHTML = '<div id="status_header"></div> <div id="status_msg"></div><div id="status_btn"></div>'
            document.body.append(elem)

            document.querySelector(this.btnElem).addEventListener('click', function () {
                this.parentNode.setAttribute('class', '')
                console.log(this.parentNode)
            })
        }

        this.msg = function (_msg, _header) {
            _header = (_header ? _header : 'Успешно')
            this.onShow('complete', _header, _msg)
            if (this.autoHide) {
                this.onHide();
            }
        }
        this.err = function (_msg, _header) {
            _header = (_header ? _header : 'Ошибка')
            this.onShow('error', _header, _msg)
            if (this.autoHide) {
                this.onHide();
            }
        }
        this.wrn = function (_msg, _header) {
            _header = (_header ? _header : 'Внимание')
            this.onShow('warning', _header, _msg)
            if (this.autoHide) {
                this.onHide();
            }
        }

        this.onShow = function (_type, _header, _msg) {
            document.querySelector(this.headerElem).innerText = _header
            document.querySelector(this.msgElem).innerText = _msg
            document.querySelector(this.containerElem).classList.add(_type)
        }

        this.onHide = function () {
            setTimeout(() => {
                document.querySelector(this.containerElem).setAttribute('class', '')
            }, this.timeOut);
        }

    }

    window.STATUS = new Status();
    const STATUS = window.STATUS;
    STATUS.init();



    /******************************************** 
     * ajax request
     ********************************************/

    window.ajax = function (params, response) {

        //params Object
        //dom element
        //collback function

        let xhr = new XMLHttpRequest();
        xhr.open((params.type ? params.type : 'POST'), params.url)

        if (params.responseType == 'json') {
            xhr.responseType = 'json';
            //xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        }

        xhr.send(params.data)

        xhr.onload = function () {
            response(xhr.status, xhr.response)
        };

        xhr.onerror = function () {
            window.STATUS.err('Error: ajax request failed')
        };

        xhr.onreadystatechange = function () {

            if (xhr.readyState == 3 && params.btn) {
                params.btn.classList.add('btn-loading')
            }

            if (xhr.readyState == 4 && params.btn) {
                setTimeout(function () {
                    params.btn.classList.remove('btn-loading')
                }, 1000)
            }

        };
    }




    /* ==============================================
    mobile menu
    ============================================== */

    if (document.querySelector('[data-menu="btn"]')) {
        const elContainer = document.querySelector('[data-menu="container"]')
        const elButton = document.querySelector('[data-menu="btn"]')

        function mobileMenu(params) {
            this.el = params.elContainer;
            this.button = params.elButton;
            this.state = 'close';

            this.open = function () {

                if (window.userMenuInstance) {
                    window.userMenuInstance.close()
                }

                this.el.classList.add('open')
                this.button.classList.add('open')
                document.body.classList.add('hidden')
                this.state = 'open';

            }

            this.close = function () {

                this.el.classList.add('close-animate')
                this.button.classList.remove('open')

                setTimeout(() => {
                    this.el.classList.remove('open')
                    this.el.classList.remove('close-animate')
                    document.body.classList.remove('hidden')
                    this.state = 'close'
                }, 200)


            }

            this.toggle = function () {
                if (this.state == 'close') this.open()
                else this.close()
            }
        }

        window.menuInstanse = new mobileMenu({
            elButton,
            elContainer
        })

        elButton.addEventListener('click', function () {
            window.menuInstanse.toggle()
        })
    }



    /* ==============================================
    select
    ============================================== */

    // public methods
    // select.afSelect.open()
    // select.afSelect.close()
    // select.afSelect.update()

    const selectCustom = new customSelect({
        selector: 'select'
    })

    selectCustom.init()

    /* ================================================
    user-menu data-user-menu="open"
    ================================================*/

    if (document.querySelector('[data-user-menu="open"]')) {



        function userMenu() {

            this.btn = document.querySelector('[data-user-menu="open"]')
            this.container = document.querySelector('.moderator-aside')

            this.open = function () {

                if (!document.querySelector('.moderator-aside') || document.body.clientWidth > 1200) {
                    window.location = this.btn.dataset.link;
                    return false
                }

                this.container.classList.add('open')
                this.btn.classList.add('open')

                if (window.menuInstanse) {
                    window.menuInstanse.close()
                }

                document.body.classList.add('hidden-profile')

            }

            this.close = function () {
                if(this.container){
                    this.container.classList.remove('open')
                }
                this.btn.classList.remove('open')
                document.body.classList.remove('hidden-profile')

                //close invite form
                if (document.querySelector('.moderator-aside__form')) {
                    document.querySelector('.moderator-aside__form').classList.remove('open')
                }
            }

            this.toggle = function () {
                if (!this.btn.classList.contains('open')) this.open()
                else this.close()

            }

            this.init = function () {
                this.btn.addEventListener('click', () => {
                    this.toggle()
                })
            }
        }

        window.userMenuInstance = new userMenu()
        window.userMenuInstance.init()



    }



    /* =========================================
    копировать в буфер
    ========================================= */

    document.querySelectorAll('[data-copy]').forEach(function (item) {
        item.addEventListener('click', function (event) {
            navigator.clipboard.writeText(event.target.dataset.copy)
                .then(() => {
                    window.STATUS.msg('Ссылка скопирована в буфер обмена')
                })
                .catch(err => {
                    console.log('Error', err);
                });
        })
    })

    /* =================================================
    scroll
    ================================================= */
    window.scrollToTargetAdjusted = function (elem) {

        //elem string selector

        if (!document.querySelector(elem)) return false;

        var element = document.querySelector(elem);
        var headerOffset = -120;
        var elementPosition = element.offsetTop
        var offsetPosition = elementPosition - headerOffset;

        window.scrollTo({
            top: offsetPosition - 100
        });

        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth"
        });
    }




});