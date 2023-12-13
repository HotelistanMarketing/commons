let scrollPos = 0;
const fab = document.querySelector('#whatsapp-fab');

function checkPosition() {
    let windowY = window.scrollY;
    if (windowY < scrollPos)
        fab.classList.remove('collapsed')
    else
        fab.classList.add('collapsed')

    scrollPos = windowY;
}

function debounce(func, wait = 10, immediate = true) {
    let timeout;
    return function () {
        let context = this, args = arguments;
        let later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        let callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

window.addEventListener('scroll', debounce(checkPosition));