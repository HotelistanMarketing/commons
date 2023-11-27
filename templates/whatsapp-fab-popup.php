<?php
assert(defined('TR'));
?>

<a id="whatsapp-fab" onclick="togglePopup()">
    <img src="/commons/assets/wp-white.webp" alt="WhatsApp" width="128" height="129">
    <span><?= TR['whatsapp_button'] ?></span>
</a>

<?php include get_template('wp-form.php', common: true) ?>

<script>
    <?php include get_script('wp-form.js', common: true) ?>
</script>