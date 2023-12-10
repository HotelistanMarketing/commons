const eventList = ["touchmove", "touchstart", "touchend", "wheel", "mousemove", "keydown"]
const autoLoadTimeout = setTimeout(triggerScripts, 1500)

eventList.forEach(event => {
    window.addEventListener(event, triggerScripts, {passive: true})
})

function triggerScripts() {
    clearTimeout(autoLoadTimeout)

    eventList.forEach(event => {
        window.removeEventListener(event, triggerScripts);
    })

    document.querySelectorAll("script[data-src]").forEach(script => {
        script.src = script.getAttribute("data-src")
        script.removeAttribute('data-src')
    })
}
