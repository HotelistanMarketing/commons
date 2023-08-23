/**
 * @author Gündüz (muharrem.yel@hotelistan.com)
 * Latest modification: 2023.04.05 23:20
 * This script has LOW priority since FAQs are usually placed above footer.
 */

const accButtons = document.getElementsByClassName("accordion-header")
let expandedButton = accButtons[0];

// TODO USE VANILLA JS!
for (let i = 0; i < accButtons.length; i++) {
    accButtons[i].addEventListener("click", function () {
        if (expandedButton)
            expandedButton.classList.toggle("expanded")

        if (expandedButton !== this)
            this.classList.toggle("expanded");

        const content = this.nextElementSibling;
        if (content.style.display === "block") {
            expandedButton = null;
            $(content).stop().css('display', 'none').toggle().slideUp();
        }
        else {
            if (expandedButton)
                $(expandedButton.nextElementSibling).stop().css('display', 'none').toggle().slideUp();

            expandedButton = this;
            $(content).stop().css('display', 'block').hide().slideDown();
        }
    });
}