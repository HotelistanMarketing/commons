<?php
assert(defined('WHATSAPP_LINK'));
?>

<?php
// Here we removed target="_blank" to work around a bug,s
// which was preventing WhatsApp from opening via Chrome on iOS.
?>
<a id="whatsapp-fab" class="collapsed" href="<?= WHATSAPP_LINK ?>">
    <img src="/commons/assets/wp-white.webp" alt="WhatsApp" width="128" height="129">
</a>
