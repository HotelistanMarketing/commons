<script>
    function formValidation() {
        const form = document.forms.namedItem("contactForm");
        const nameInput = form['Last_Name'];
        if (nameInput && nameInput.value.replace(/^\s+|\s+$/g, '').length === 0) {
            alert("<?= TR['form_empty_field_warning'] ?>".replace("%s", nameInput.placeholder));
            nameInput.focus();
            return false;
        }

        const isPhoneNumberValid = window?.iti?.isValidNumber() || iti?.isValidNumber();
        if (!isPhoneNumberValid) {
            alert("<?= TR['form_phone_validation'] ?>")
            form['Phone'].focus();
        }

        return isPhoneNumberValid;
    }
</script>