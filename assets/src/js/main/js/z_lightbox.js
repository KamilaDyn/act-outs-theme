const button = document.querySelectorAll('.watch');
const lightDiv = document.querySelectorAll('.display')
const closebtn = document.querySelectorAll('.closebtn');


button.forEach(i => i.addEventListener(
    "click",
    e => {
        const currentDiv = e.currentTarget.closest('.img-preloader').querySelector('.light');
        const currentIframe = currentDiv.querySelector('.wp-video iframe');
        const srcFrame = currentIframe.src;
        const allLight = document.querySelectorAll('.wp-video #video-1dis');
        const image = e.currentTarget.closest('.img-preloader').querySelector('.img');

        image.classList.add('img-none');
        currentDiv.setAttribute('id', 'display');
        currentIframe.setAttribute('id', 'video-1dis');

        const playVimeo = new Vimeo.Player(currentIframe);
        playVimeo.play();

        for (let i = 0; i < allLight.length; i++) {
            if (allLight[i].getAttribute('id') != null) {

                const curentIDframe = allLight[i]
                const playVimeo = new Vimeo.Player(curentIDframe);
                playVimeo.pause();
                currentDiv.removeAttribute('id')
                image.classList.remove('img-none');
            }

        }

        if (!currentDiv.hasAttribute('id') && currentIframe.getAttribute('src') == srcFrame) {
            const allLight = document.querySelectorAll('.light');
            const images = document.querySelectorAll('.img-none');

            for (let i = 0; i < images.length; i++) {
                images[i].classList.remove('img-none')
            }
            for (let i = 0; i < allLight.length; i++) {
                allLight[i].removeAttribute('id');
            }
            currentIframe.setAttribute('id', 'video-1dis')

            currentDiv.setAttribute('id', 'display');
            image.classList.add('img-none');
            var vid1 = new Vimeo.Player(currentIframe);
            vid1.play();

        }

        const containerBtn = currentDiv.querySelector('.container-btn');
        containerBtn.style.visibility = "hidden";
        const wpVideoDiv = currentDiv.querySelector('.wp-video')
        wpVideoDiv.onmouseover = () => {
            containerBtn.style.visibility = "visible";
        }
        containerBtn.onmouseover = () => {
            containerBtn.style.visibility = "visible";
        }

        wpVideoDiv.onmouseout = () => {
            containerBtn.style.visibility = "hidden";
        }
        containerBtn.onmouseout = () => {
            containerBtn.style.visibility = "hidden";
        }


    }));

closebtn.forEach(i => i.addEventListener(
    "click",
    e => {
        let currentDiv = e.currentTarget.closest('.img-preloader').querySelector('.light');

        let currentIframe = currentDiv.querySelector('.wp-video iframe');
        const allLight = document.querySelectorAll('.light');
        const image = e.currentTarget.closest('.img-preloader').querySelector('.img');
        image.classList.remove('img-none');
        for (let i = 0; i < allLight.length; i++) {
            allLight[i].removeAttribute('id')
        }
        var vid1 = new Vimeo.Player(currentIframe);
        vid1.pause();

        currentIframe.removeAttribute('id')
    }
))