<a id="whatsapp-fab" onclick="togglePopup()">
    <img src="/commons/assets/wp-white.png" alt="WhatsApp" width="1500" height="1508">
    <span><?= TR['whatsapp_button'] ?></span>
</a>

<?php include get_template('wp-form.php', common: true) ?>

<script>
    <?php include get_script('wp-form.js', common: true) ?>
</script>