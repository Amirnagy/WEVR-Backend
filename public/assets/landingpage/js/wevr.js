let side = document.querySelector('.side-bar')

const open_side = () => {
    side.classList.add('open-side')
    document.body.style.overflowY = "hidden"
}

const close_side = () => {
    side.classList.remove('open-side')
    document.body.style.overflowY = "auto"
}

document.addEventListener('click', (e) => {
    if (e.target.id === "side") {
        close_side();
    }
})





let scroll_icon = document.querySelector('.scroll-to-up');
let nav = document.querySelector('.header-nav');

const scroll_func = () => {
    // scroll to top btn
    if (window.scrollY > 700) {
        scroll_icon.classList.add('show-icon');
    }
    else {
        scroll_icon.classList.remove('show-icon');
    }


    // nav
    if (window.scrollY > 100) {
        nav.classList.add('fixed-nav');
    }
    else {
        nav.classList.remove('fixed-nav');
    }
}

scroll_icon.addEventListener('click', () => {
    window.scrollTo(0, 0, 'smooth')
})

document.addEventListener('scroll', scroll_func)
