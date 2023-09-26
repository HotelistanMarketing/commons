<a id="whatsapp-fab" onclick="togglePopup()">
    <img src="<?php get_webp('wp-white.png') ?>" alt="" width="1500" height="1508">
    <span><?= TR['whatsapp_button'] ?></span>
</a>

<?php include get_template("wp-form", common: true) ?>

<script>
    function togglePopup() {
        const popupForm = document.getElementById("popup-form")
        popupForm.classList.toggle("visible")
    }

    const popupForm = document.getElementById("popup-form")
    popupForm.onclick = function (event) {
        if (!event.target.closest(".popup"))
            popupForm.classList.toggle("visible")
    }
</script>