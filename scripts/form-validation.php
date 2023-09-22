<script>
    function formValidation(nameRequired = true, alert = true) {
        const form = document.forms.namedItem("contactForm");

        if (nameRequired) {
            const nameInput = form['Last_Name'];
            if (nameInput && nameInput.value.replace(/^\s+|\s+$/g, '').length === 0) {
                if (alert)
                    alert("<?= TR['form_empty_field_warning'] ?>".replace("%s", nameInput.placeholder));

                nameInput.focus();
                return false;
            }
        }

        const input = form['Phone'];
        const iti = window.intlTelInputGlobals.getInstance(input);
        const isPhoneNumberValid = iti.isValidNumber();
        if (!isPhoneNumberValid) {
            if (alert)
                alert("<?= TR['form_phone_validation'] ?>")

            input.focus();
        }

        return isPhoneNumberValid;
    }
</script>