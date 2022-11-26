document.addEventListener('DOMContentLoaded', function (event) {



    /* =================================================
     slide
     =================================================*/

    if (document.querySelector('.slide-menu')) {


        function SlideMenu() {

            this.$el = document.querySelector('.slide-menu')
            this.line = this.$el.querySelector('.sliding-line')


            this.init = function () {

                if (this.$el.querySelector('.active')) {
                    this.slideLine(this.$el.querySelector('.active'))
                } else {
                    this.changeActive(0)
                }


                this.addEvents()
            }

            this.changeActive = function (indexActive) {
                this.$el.querySelectorAll('li').forEach((li, index) => {



                    if (index == indexActive) {
                        li.classList.add('active')
                        this.slideLine(li)

                    } else {
                        if (li.classList.contains('active')) li.classList.remove('active')
                    }

                })
            }

            this.slideLine = function (li) {
                console.log(li)

                li = li.querySelector('a')

                this.line.style.left = li.offsetLeft + 'px'
                this.line.style.width = li.clientWidth + 'px'

            }

            this.addEvents = function () {
                this.$el.querySelectorAll('li').forEach((li, index) => {
                    li.addEventListener('mouseenter', (e) => {
                        this.slideLine(li)
                    })

                    li.addEventListener('mouseleave', (e) => {
                        this.slideLine(this.$el.querySelector('.active'))
                    })
                })

                window.addEventListener('resize', (e) => {
                    this.slideLine(this.$el.querySelector('.active'))
                })
            }

        }

        const slideMenuInstanse = new SlideMenu();
        slideMenuInstanse.init();

    }

    /* =====================================
    spoiler
    =====================================*/

    if (document.querySelector('.post-box__spoiler-btn')) {
        document.querySelectorAll('.post-box__spoiler-btn').forEach(item => {
            item.addEventListener('click', e => {

                let elText = e.target.closest('.post-box__spoiler').querySelector('.post-box__spoiler-text')
                elText.classList.toggle('open')
                item.innerHTML = (elText.classList.contains('open') ? 'Свернуть' : 'Показать полностью')

            })
        })
    }





});