/**
 * @author Gündüz (muharrem.yel@hotelistan.com)
 * This script has LOW priority since FAQs are usually placed above footer.
 */

const accButtons = document.querySelectorAll("#faq .accordion-header")
let expandedButton = accButtons?.item(0).classList.contains("expanded") ? accButtons[0] : null

for (let i = 0; i < accButtons.length; i++) {
    accButtons[i].addEventListener("click", function () {
        if (expandedButton)
            expandedButton.classList.toggle("expanded")

        if (expandedButton !== this) {
            this.classList.toggle("expanded")
            expandedButton = this
        }
        else expandedButton = null
    });
}