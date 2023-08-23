<script>
    function formValidation() {
        const mndFields = ['Last_Name', 'Mobile'];
        for (let i = 0; i < mndFields.length; i++) {
            const fieldObj = document.forms.namedItem("contactForm")[mndFields[i]];
            if (fieldObj) {
                if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length === 0) {
                    fieldObj.focus();
                    alert("<?= TR['form_empty_field_warning'] ?>".replace("%s", fieldObj.placeholder));
                    return false;
                }
                else if (fieldObj.id === "Mobile") {
                    // TODO improve by checking alphanumeric!
                    if (fieldObj.value.length < 8 || fieldObj.value.length > 15) {
                        fieldObj.focus();
                        alert("<?= TR['form_phone_validation'] ?>")
                        return false;
                    }
                }
            }
        }
    }
</script>