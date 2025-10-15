<?php
assert(defined('LEAD_LANGUAGE'));
assert(defined('LEAD_SOURCE'));
assert(defined('LEAD_INTEREST'));
assert(defined('LEAD_PROCEDURE'));
assert(defined('LEAD_DR'));
assert(defined('TR'));
?>

<form id='contactForm'>
    <label for='Last_Name'><?= TRC['form_name'] ?></label>
    <input type='text' id='Last_Name' name='Name' maxlength='30' placeholder="<?= TRC['form_name'] ?>" required>

    <label for='Phone'><?= TRC['form_phone'] ?></label>
    <input type='tel' id='Phone' name='Phone' maxlength='15' placeholder="<?= TRC['form_phone'] ?>" required
           data-warning-msg="<?= TRC['form_phone_validation'] ?>">

    <label for='Email'><?= TRC['form_mail'] ?></label>
    <input type='email' id='Email' name='Email' maxlength='100' placeholder="<?= TRC['form_mail'] ?>">

    <input type='hidden' name='Country' maxlength='100' value='DefaultCountry'>
    <input type='hidden' name='Language' value='<?= LEAD_LANGUAGE ?>'>
    <input type='hidden' name='Source' value='<?= LEAD_SOURCE ?>'>
    <input type='hidden' name='Interest' value='<?= LEAD_INTEREST ?>'>
    <input type='hidden' name='Procedure' value='<?= LEAD_PROCEDURE ?>'>
    <input type='hidden' name='Doctor' value='<?= LEAD_DR ?>'>
    
    <?php if (defined('LEAD_SOURCE_DETAIL')): ?>
        <input type='hidden' name='<?= LEAD_SOURCE_DETAIL_API ?? 'Single_Line_5' ?>' value='<?= LEAD_SOURCE_DETAIL ?>'>
    <?php endif ?>
    
    <?php if (defined('LEAD_SOURCE_API')): ?>
        <input type='hidden' name='<?= LEAD_SOURCE_API ?>' value='<?= LEAD_SOURCE ?>'>
    <?php endif ?>

    <input type='hidden' name='zc_gad' value="<?= $_GET['zc_gad'] ?? '' ?>">
    <input type="hidden" name="utm_source" value="<?= $_GET['utm_source'] ?? '' ?>">
    <input type="hidden" name="utm_medium" value="<?= $_GET['utm_medium'] ?? '' ?>">
    <input type="hidden" name="utm_matchtype" value="<?= $_GET['utm_matchtype'] ?? '' ?>">
    <input type="hidden" name="utm_keyword" value="<?= $_GET['utm_keyword'] ?? '' ?>">
    <input type="hidden" name="utm_network" value="<?= $_GET['utm_network'] ?? '' ?>">
    <input type="hidden" name="gclid" value="<?= $_GET['gclid'] ?? '' ?>">
    <input type="hidden" name="ip" value="<?= get_real_user_ip() ?>">

    <?php if (defined('FORM_RETURN_URL')): ?>
        <input type='hidden' name='returnURL' value='<?= FORM_RETURN_URL ?>'>
    <?php elseif (defined('FORM_THANK_YOU_PAGE')): ?>
        <input type='hidden' name='returnURL' value='<?= FORM_THANK_YOU_PAGE ?>'>
    <?php endif ?>

    <button type="submit" id='formsubmit' class='formsubmit button' title='Submit'>
        <?= TR['form_button'] ?>
    </button>
</form>
