<!--suppress HtmlFormInputWithoutLabel -->
<form id="contactForm"
      action='https://crm.zoho.com/crm/WebToLeadForm'
      name='<?= FORM_NAME ?>'
      method='POST'
      accept-charset='UTF-8'>

    <label for='Last_Name'><?= TRC['form_name'] ?></label>
    <input type='text' id='Last_Name' name='Last Name' maxlength='80' placeholder="<?= TRC['form_name'] ?>">

    <label for='Phone'><?= TRC['form_phone'] ?></label>
    <input type='text' id='Phone' name='Phone' maxlength='15' placeholder="<?= TRC['form_phone'] ?>">

    <label for='Email'><?= TRC['form_mail'] ?></label>
    <input type='text' id='Email' name='Email' maxlength='100' placeholder="<?= TRC['form_mail'] ?>">

    <label for='Country'>Country</label>
    <input type='hidden' id='Country' name='Country' maxlength='100' value='DefaultCountry'>

    <label for='Lead_Status'>Lead Status</label>
    <select class='hidden' id='Lead_Status' name='Lead Status'>
        <option selected value='New'></option>
    </select>

    <label for='LEADCF2'>Language</label>
    <select class='hidden' id='LEADCF2' name='LEADCF2'>
        <option selected value='<?= LEAD_LANGUAGE ?>'></option>
    </select>

    <label for='Lead_Source'>Lead Source</label>
    <select class='hidden' id='Lead_Source' name='Lead Source'>
        <option selected value='<?= LEAD_SOURCE ?>'></option>
    </select>

    <label for='LEADCF48'>Interest</label>
    <select class='hidden' id='LEADCF48' name='LEADCF48' multiple>
        <option selected value='<?= LEAD_INTEREST ?>'></option>
    </select>

    <label for='LEADCF15'>Procedure</label>
    <select class='hidden' id='LEADCF15' name='LEADCF15' multiple>
        <option selected value='<?= LEAD_PROCEDURE ?>'></option>
    </select>

    <label for='Description'>Description</label>
    <textarea class="hidden" id='Description' name='Description'><?= LEAD_PROCEDURE ?></textarea>

    <input type='text' style='display:none;' name='xnQsjsdp'
           value='f26b68fc575ddfcaee437b8e12d5515126eae05cf5d1a5976d576056a6237774'>
    <input type='text' style='display:none;' name='xmIwtLD' value='<?= FORM_xmIwtLD ?>'>
    <input type='text' style='display:none;' name='actionType' value='TGVhZHM='>
    <input type='text' style='display:none;' name='returnURL' value='<?= FORM_THANK_YOU_PAGE ?>'>

    <input type='hidden' id='zc_gad' name='zc_gad' value="<?= $_GET['zc_gad'] ?? '' ?>">
    <input type="hidden" id="LEADCF35" name="LEADCF35" value="<?= $_GET['utm_source'] ?? '' ?>">
    <input type="hidden" id="LEADCF36" name="LEADCF36" value="<?= $_GET['utm_medium'] ?? '' ?>">
    <input type="hidden" id="LEADCF37" name="LEADCF37" value="<?= $_GET['utm_matchtype'] ?? '' ?>">
    <input type="hidden" id="LEADCF38" name="LEADCF38" value="<?= $_GET['utm_keyword'] ?? '' ?>">
    <input type="hidden" id="LEADCF39" name="LEADCF39" value="<?= $_GET['utm_network'] ?? '' ?>">
    <input type="hidden" id="LEADCF40" name="LEADCF40" value="<?= $_GET['gclid'] ?? '' ?>">

    <button type="submit" id='formsubmit' class='formsubmit button' title='Submit'>
        <?= TR['form_button'] ?>
    </button>

    <?php // Do not remove this --- Analytics Tracking code starts ?>
    <script id='wf_anal' src='https://crm.zohopublic.com/crm/WebFormAnalyticsServeServlet?rid=<?= FORM_ANAL_RID ?>'>
    </script>
</form>
