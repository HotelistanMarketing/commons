<script>
    function formFieldCheck() {
        const mndFields = ['Last Name', 'Mobile'];
        const fldLangVal = ['Name\x20\x26\x20Surname', 'Mobile'];
        for (let i = 0; i < mndFields.length; i++) {
            const fieldObj = document.forms.namedItem("contactForm")[mndFields[i]];
            if (fieldObj) {
                if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length === 0) {
                    alert("<?= TR['form_empty_field_warning'] ?>".replace("%s", fldLangVal[i]));
                    fieldObj.focus();
                    return false;
                }
                else if (fieldObj.name === "Mobile") {
                    // TODO improve by checking alphanumeric!
                    if (fieldObj.value.length < 8 || fieldObj.value.length > 15) {
                        alert("<?= TR['form_phone_validation'] ?>")
                        fieldObj.focus();
                        return false;
                    }
                }
                try {
                    if (fieldObj.name === 'Last Name')
                        name = fieldObj.value;
                } catch (e) {
                    console.error(e)
                }
            }
        }
        document.querySelector('.crmWebToEntityForm .formsubmit').setAttribute('disabled', true);
    }
</script>