<!--suppress HtmlFormInputWithoutLabel -->
<form id="contactForm"
      action='https://crm.zoho.com/crm/WebToLeadForm'
      name='<?= FORM_NAME ?>'
      method='POST'
      onSubmit='return formValidation()'
      accept-charset='UTF-8'>

    <label for='Last_Name'><?= TR['form_name'] ?></label>
    <input type='text' id='Last_Name' name='Last Name' maxlength='80' placeholder="<?= TR['form_name'] ?>">

    <label for='Mobile'><?= TR['form_phone'] ?></label>
    <input type='text' id='Mobile' name='Mobile' maxlength='30' placeholder="<?= TR['form_phone'] ?>">

    <label for='Email'><?= TR['form_mail'] ?></label>
    <input type='text' id='Email' name='Email' maxlength='100' placeholder="<?= TR['form_mail'] ?>">

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

    <label for='Description'>Description</label>
    <textarea class="hidden" id='Description' name='Description'><?= LEAD_DESCRIPTION ?></textarea>

    <label for='LEADCF48'>Treatments</label>
    <select class='hidden' id='LEADCF48' name='LEADCF48' multiple>
        <option selected value='<?= LEAD_TREATMENTS ?>'></option>
    </select>

    <label for='Lead_Source'>Lead Source</label>
    <select class='hidden' id='Lead_Source' name='Lead Source'>
        <option selected value='<?= LEAD_SOURCE ?>'></option>
    </select>

    <label for='LEADCF15'>Treatment</label>
    <select class='hidden' id='LEADCF15' name='LEADCF15' multiple>
        <option selected value='<?= LEAD_TREATMENT ?>'></option>
    </select>

    <input type='text' style='display:none;' name='xnQsjsdp'
           value='f26b68fc575ddfcaee437b8e12d5515126eae05cf5d1a5976d576056a6237774'>
    <input type='text' style='display:none;' name='xmIwtLD' value='<?= FORM_xmIwtLD ?>'>
    <input type='text' style='display:none;' name='actionType' value='TGVhZHM='>
    <input type='text' style='display:none;' name='returnURL' value='<?= FORM_THANK_YOU_PAGE ?>'>

    <input type='hidden' id='zc_gad' name='zc_gad' value=''>
    <input type="hidden" id="utm_source" name="utm_source" value="">

    <button type="submit" id='formsubmit' class='formsubmit button' title='Submit'>
        <?= TR['form_button'] ?>
    </button>

    <?php // Do not remove this --- Analytics Tracking code starts ?>
    <script id='wf_anal' src='https://crm.zohopublic.com/crm/WebFormAnalyticsServeServlet?rid=<?= FORM_ANAL_RID ?>'>
    </script>
</form>
