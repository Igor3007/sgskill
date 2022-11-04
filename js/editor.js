document.addEventListener('DOMContentLoaded', function (event) {

    class editorFileUpload {
        constructor(files) {
            this.files = files
        }

        ajax(params, response) {
            let xhr = new XMLHttpRequest();

            xhr.responseType = 'json';

            xhr.open('POST', '/admin/cp.php?view=rest&method=uploadEditor')
            xhr.send(params.data)
            xhr.onload = function () {
                response(xhr.status, xhr.response)
            };

            xhr.onerror = function () {
                window.STATUS.err('Error: ajax request failed')
            };

            xhr.onreadystatechange = function () {

                if (xhr.readyState == 3) {
                    //params.btn.classList.add('btn-loading')
                    console.log('loading...')
                }

                if (xhr.readyState == 4) {
                    setTimeout(function () {
                        //params.btn.classList.remove('btn-loading')
                        console.log('loaded')
                    }, 1000)
                }

            };
        }

        upload(callback) {


            let formData = new FormData();

            formData.append('file', this.files.item(0))

            let params = {
                data: formData
            }

            this.ajax(params, function (status, response) {
                console.log(response)

                if (response.msg) {
                    window.STATUS.msg(response.msg)
                } else {
                    window.STATUS.err(response.msg)
                }

                callback(response);
            })




        }

    }

    class editorComponentHeader {
        constructor() {
            this.elem = null;
        }



        template() {
            return `
                <div class="editor-header">
                    <input type="text" placeholder="Название заголовка">
                </div>
            `
        }
    }

    class editorComponentVideo {
        constructor() {}

        createElement() {
            this.elem = document.createElement('div')
            this.elem.innerHTML = this.template()

            this.uploadFile(this.elem)

            return this.elem;
        }

        uploadFile(element) {
            element.querySelector('[type="file"]').addEventListener('change', e => {



                let uploadInstanse = new editorFileUpload(e.target.files)
                uploadInstanse.upload((event) => {

                    element.querySelector('[data-upload-src]').src = event.file.orig
                    element.querySelector('[data-upload-src]').dataset.uploadSrc = event.file.orig


                })


            })
        }

        template() {
            return `
            <div class="editor-video">
                <div class="editor-video__preview">
                    <picture>
                        <img src="/img/common/lesson.jpg" data-upload-src="" alt="">
                        <label class="attach-file-editor">
                            <input type="file" name="file-editor">
                            <span> Выбрать файл </span>
                        </label>
                    </picture>
                </div>
                <div class="editor-video__link">
                    <input type="text" placeholder="Ссылка">
                </div>
            </div>
            `
        }

        getElement() {
            return this.createElement()
        }
    }

    class editorComponentSpoiler {
        constructor() {}

        template() {
            return `
                <div class="editor-spoiler">
                    <textarea type="text" placeholder="Текст со спойлером"></textarea>
                </div>
            `
        }
    }

    class editorComponentText {
        constructor() {}

        template() {
            return `
                <div class="editor-text">
                    <textarea type="text" placeholder="Текстовый блок"></textarea>
                </div>
            `
        }
    }

    class editorComponentAudio {
        constructor() {}

        template() {
            return `
            <div class="editor-audio">
                <input type="text" placeholder="Ссылка на mp3">
            </div>
            `
        }
    }

    class editorComponentImage {
        constructor() {
            this.createElement()
            this.elem = null;
        }

        removeImage(element) {
            element.querySelector('.egallery-remove').addEventListener('click', e => {
                if (confirm('Удалить фото ?')) {
                    e.target.closest('picture').remove()
                }

            })
        }

        uploadFile(element) {
            element.querySelector('[type="file"]').addEventListener('change', e => {

                if (this.elem.querySelector('.editor__empty')) {
                    this.elem.querySelector('.editor__empty').remove()
                }

                let uploadInstanse = new editorFileUpload(e.target.files)
                uploadInstanse.upload((event) => {

                    let file = document.createElement('picture')
                    file.innerHTML = '<img data-upload-src="' + event.file.orig + '" src="' + event.file.orig + '" alt=""> <span class="egallery-remove">+</span>'
                    this.removeImage(file)
                    this.elem.querySelector('.editor-gallery__images').append(file)


                    new Sortable(this.elem.querySelector('.editor-gallery__images'), {
                        animation: 150,
                        direction: 'horizontal',
                    });
                })


            })
        }

        createElement() {
            this.elem = document.createElement('div')
            this.elem.innerHTML = this.template()
            this.uploadFile(this.elem)

            return this.elem;
        }

        template() {
            return `
            <div class="editor-gallery">
                <div class="editor-gallery__images">
                    <div class="editor__empty" >Добавьте фото в блок</div>
                </div>
                <div class="editor-gallery__action">
                    <label class="attach-file-editor">
                    <input type="file" name="file-editor">
                    <span> Добавить файл </span>
                    </label>
                </div>
            </div>
            `
        }

        getElement() {
            return this.createElement()
        }
    }


    class postEditor {

        constructor(selector) {
            this.$el = document.querySelector(selector);



            this.addEvents()
        }

        removeBlock(elem) {
            elem.querySelector('.editor__block-remove').addEventListener('click', e => {

                if (confirm('Удалить блок?')) {
                    e.target.closest('.editor__block').remove()
                }

            })
        }

        createTemplateBlock(name) {

            const html = ` 
             
            <div class="editor__block-remove">+</div>
            <div class="editor__block-handle"></div>
             `;

            const elem = document.createElement('div')
            elem.classList.add('editor__block')
            elem.dataset.contentBlock = name
            elem.innerHTML = html

            this.removeBlock(elem)

            return elem;

        }

        insertBlock(props) {

            this.$el.querySelector('.editor__empty').style.display = 'none'

            const mainTemplate = this.createTemplateBlock(props.name)
            const blockTemplate = document.createElement('div')

            if (props.type == 'element') {
                mainTemplate.append(props.elem);
                this.$el.querySelector('.editor__content').append(mainTemplate)
            }


            if (props.type == 'string') {
                blockTemplate.innerHTML = props.elem
                mainTemplate.append(blockTemplate);
                this.$el.querySelector('.editor__content').append(mainTemplate)
            }




            new Sortable(document.querySelector('.editor__content'), {
                animation: 150,
                handle: '.editor__block-handle'
            });







        }

        addEvents() {
            this.$el.querySelectorAll('[data-editor-block]').forEach(item => {
                item.addEventListener('click', e => {


                    switch (item.dataset.editorBlock) {
                        case 'header':
                            this.insertBlock({
                                elem: new editorComponentHeader().template(),
                                type: 'string',
                                name: item.dataset.editorBlock
                            })
                            break;
                        case 'video':
                            this.insertBlock({
                                elem: new editorComponentVideo().getElement(),
                                type: 'element',
                                name: item.dataset.editorBlock
                            })
                            break;
                        case 'spoiler':
                            this.insertBlock({
                                elem: new editorComponentSpoiler().template(),
                                type: 'string',
                                name: item.dataset.editorBlock
                            })
                            break;
                        case 'text':
                            this.insertBlock({
                                elem: new editorComponentText().template(),
                                type: 'string',
                                name: item.dataset.editorBlock
                            })
                            break;
                        case 'audio':
                            this.insertBlock({
                                elem: new editorComponentAudio().template(),
                                type: 'string',
                                name: item.dataset.editorBlock
                            })
                            break;
                        case 'image':
                            this.insertBlock({
                                elem: new editorComponentImage().getElement(),
                                type: 'element',
                                name: item.dataset.editorBlock
                            })
                            break;
                    }


                })
            });
        }

        getResulsJson() {

            let arrayResult = [];

            this.$el.querySelectorAll('[data-content-block]').forEach(block => {

                switch (block.dataset.contentBlock) {
                    case 'image':

                        let arrImage = [];

                        block.querySelectorAll('[data-upload-src]').forEach(img => {
                            arrImage.push({
                                url: img.dataset.uploadSrc,
                                id: 10,
                            })
                        })

                        arrayResult.push({
                            type: block.dataset.contentBlock,
                            image: arrImage
                        })

                        break;

                    case 'video':

                        arrayResult.push({
                            type: block.dataset.contentBlock,
                            image: block.querySelector('[data-upload-src]').src,
                            link: block.querySelector('[type="text"]').value,
                        })

                        break;

                    case 'header':
                    case 'spoiler':
                    case 'text':

                        arrayResult.push({
                            type: block.dataset.contentBlock,
                            text: block.querySelector('[type="text"]').value,
                        })

                        break;

                    case 'audio':

                        arrayResult.push({
                            type: block.dataset.contentBlock,
                            link: block.querySelector('[type="text"]').value,
                        })

                        break;
                }

            })

            console.log(arrayResult)

            return (arrayResult.length ? JSON.stringify(arrayResult) : '');
        }
    }

    window.editorInstanse = new postEditor('.editor')

});