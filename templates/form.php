<?php
assert(defined('FORM_NAME'));
assert(defined('LEAD_LANGUAGE'));
assert(defined('LEAD_SOURCE'));
assert(defined('LEAD_INTEREST'));
assert(defined('LEAD_PROCEDURE'));
assert(defined('LEAD_DR'));
assert(defined('FORM_xmIwtLD'));
assert(defined('TR'));
?>

<form id='contactForm'
      action='https://crm.zoho.com/crm/WebToLeadForm'
      name='<?= FORM_NAME ?>'
      method='POST'
      accept-charset='UTF-8'>

    <label for='Last_Name'><?= TRC['form_name'] ?></label>
    <input type='text' id='Last_Name' name='Last Name' maxlength='30' placeholder="<?= TRC['form_name'] ?>" required>

    <label for='Phone'><?= TRC['form_phone'] ?></label>
    <input type='tel' id='Phone' name='Phone' maxlength='15' placeholder="<?= TRC['form_phone'] ?>" required
           data-warning-msg="<?= TRC['form_phone_validation'] ?>">

    <label for='Email'><?= TRC['form_mail'] ?></label>
    <input type='email' id='Email' name='Email' maxlength='100' placeholder="<?= TRC['form_mail'] ?>">

    <input type='hidden' id='Country' name='Country' maxlength='100' value='DefaultCountry'>
    <input type='hidden' id='LEADCF2' name='LEADCF2' value='<?= LEAD_LANGUAGE ?>'>
    <input type='hidden' id='Lead_Source' name='Lead Source' value='<?= LEAD_SOURCE ?>'>
    <input type='hidden' id='LEADCF48' name='LEADCF48' value='<?= LEAD_INTEREST ?>'>
    <input type='hidden' id='LEADCF15' name='LEADCF15' value='<?= LEAD_PROCEDURE ?>'>
    <input type='hidden' id='DR' name='DR' value='<?= LEAD_DR ?>'>

    <input type='hidden' name='xnQsjsdp' value='f26b68fc575ddfcaee437b8e12d5515126eae05cf5d1a5976d576056a6237774'>
    <input type='hidden' name='xmIwtLD' value='<?= FORM_xmIwtLD ?>'>
    <input type='hidden' name='actionType' value='TGVhZHM='>
    <?php if (defined('FORM_RETURN_URL')): ?>
        <input type='hidden' name='returnURL' value='<?= FORM_RETURN_URL ?>'>
    <?php elseif (defined('FORM_THANK_YOU_PAGE')): ?>
        <input type='hidden' name='returnURL' value='<?= FORM_THANK_YOU_PAGE ?>'>
    <?php endif ?>

    <input type='hidden' id='zc_gad' name='zc_gad' value="<?= $_GET['zc_gad'] ?? '' ?>">
    <input type="hidden" id="LEADCF35" name="LEADCF35" value="<?= $_GET['utm_source'] ?? '' ?>">
    <input type="hidden" id="LEADCF36" name="LEADCF36" value="<?= $_GET['utm_medium'] ?? '' ?>">
    <input type="hidden" id="LEADCF37" name="LEADCF37" value="<?= $_GET['utm_matchtype'] ?? '' ?>">
    <input type="hidden" id="LEADCF38" name="LEADCF38" value="<?= $_GET['utm_keyword'] ?? '' ?>">
    <input type="hidden" id="LEADCF39" name="LEADCF39" value="<?= $_GET['utm_network'] ?? '' ?>">
    <input type="hidden" id="LEADCF40" name="LEADCF40" value="<?= $_GET['gclid'] ?? '' ?>">
    <input type="hidden" id="ip" name="ip" value="<?= get_real_user_ip() ?>">

    <button type="submit" id='formsubmit' class='formsubmit button' title='Submit'>
        <?= TR['form_button'] ?>
    </button>
</form>
