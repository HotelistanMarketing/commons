let scrollPos = 0;
const telegramFab = document.querySelector('#telegram-fab');

function checkTelegramPosition() {
    let windowY = window.scrollY;
    if (windowY < scrollPos)
        telegramFab.classList.remove('collapsed')
    else
        telegramFab.classList.add('collapsed')

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

if (telegramFab) {
    window.addEventListener('scroll', debounce(checkTelegramPosition));
}
