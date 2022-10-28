document.addEventListener('DOMContentLoaded', function (event) {



    /* =================================================
     slide
     =================================================*/

    if (document.querySelector('.slide-menu')) {


        function SlideMenu() {

            this.$el = document.querySelector('.slide-menu')
            this.line = this.$el.querySelector('.sliding-line')


            this.init = function () {
                this.changeActive(0)
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


});