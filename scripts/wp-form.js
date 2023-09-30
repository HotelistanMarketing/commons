function togglePopup() {
    const popupForm = document.getElementById("popup-form")
    popupForm.classList.toggle("visible")
}

const popupForm = document.getElementById("popup-form")
popupForm.onclick = function (event) {
    if (!event.target.closest(".popup"))
        popupForm.classList.toggle("visible")
}