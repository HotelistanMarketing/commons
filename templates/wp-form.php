<!--suppress HtmlFormInputWithoutLabel -->
<div id="popup-form" class="overlay">
    <div class="popup">
        <h1><?= TRC['wp_form_title'] ?></h1>
        <a class="close-button" onclick="togglePopup()">&times;</a>
        <p><?= TRC['wp_form_description'] ?></p>

        <form id="wp-form"
              action='https://crm.zoho.com/crm/WebToLeadForm'
              name='<?= FORM_NAME ?>'
              method='POST'
              accept-charset='UTF-8'
              data-optional-name>

            <label for='Last_Name'><?= TRC['form_name_opt'] ?></label>
            <input type='text' id='Last_Name' name='Last Name' maxlength='80' placeholder="<?= TRC['form_name_opt'] ?>">

            <label for='Phone'><?= TRC['form_phone'] ?></label>
            <input type='tel' id='Phone' name='Phone' maxlength='15' placeholder="<?= TRC['form_phone'] ?>">

            <input type='hidden' id='Country' name='Country' maxlength='100' value='DefaultCountry'>
            <input type='hidden' id='Lead_Status' name='Lead Status' value='New'>
            <input type='hidden' id='LEADCF2' name='LEADCF2' value='<?= LEAD_LANGUAGE ?>'>
            <input type='hidden' id='Lead_Source' name='Lead Source' value='<?= FORM_WP_LEAD_SOURCE ?>'>
            <input type='hidden' id='LEADCF48' name='LEADCF48' value='<?= LEAD_INTEREST ?>'>
            <input type='hidden' id='LEADCF15' name='LEADCF15' value='<?= LEAD_PROCEDURE ?>'>
            <input type='hidden' id='Description' name='Description' value='<?= LEAD_PROCEDURE ?>'>

            <input type='hidden' name='xnQsjsdp' value='f26b68fc575ddfcaee437b8e12d5515126eae05cf5d1a5976d576056a6237774'>
            <input type='hidden' name='xmIwtLD' value='<?= FORM_xmIwtLD ?>'>
            <input type='hidden' name='actionType' value='TGVhZHM='>
            <input type='hidden' name='returnURL' value='<?= FORM_RETURN_URL ?>'>

            <input type='hidden' id='zc_gad' name='zc_gad' value="<?= $_GET['zc_gad'] ?? '' ?>">
            <input type="hidden" id="LEADCF35" name="LEADCF35" value="<?= $_GET['utm_source'] ?? '' ?>">
            <input type="hidden" id="LEADCF36" name="LEADCF36" value="<?= $_GET['utm_medium'] ?? '' ?>">
            <input type="hidden" id="LEADCF37" name="LEADCF37" value="<?= $_GET['utm_matchtype'] ?? '' ?>">
            <input type="hidden" id="LEADCF38" name="LEADCF38" value="<?= $_GET['utm_keyword'] ?? '' ?>">
            <input type="hidden" id="LEADCF39" name="LEADCF39" value="<?= $_GET['utm_network'] ?? '' ?>">
            <input type="hidden" id="LEADCF40" name="LEADCF40" value="<?= $_GET['gclid'] ?? '' ?>">

            <button type="submit" id='formsubmit' class='formsubmit wp-link' title='Submit'>
                <?= TRC['wp_form_button'] ?>
            </button>
        </form>
    </div>
</div>
