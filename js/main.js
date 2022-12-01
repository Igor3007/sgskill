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
                    this.scrollElement(this.$el, this.$el.querySelector('.active'))
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

            this.scrollElement = function (container, elem) {

                var rect = elem.getBoundingClientRect();
                var rectContainer = container.getBoundingClientRect();

                let elemOffset = {
                    top: rect.top + document.body.scrollTop,
                    left: rect.left + document.body.scrollLeft
                }

                let containerOffset = {
                    top: rectContainer.top + document.body.scrollTop,
                    left: rectContainer.left + document.body.scrollLeft
                }

                let leftPX = elemOffset.left - containerOffset.left + container.scrollLeft - (container.offsetWidth / 2) + (elem.offsetWidth / 2)

                container.scrollTo({
                    left: leftPX,
                    behavior: 'smooth'
                });

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