<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', event => {
            event.preventDefault()
            if (formValidation(event.target))
                event.target.submit()
        });
    })

    function formValidation(form) {
        const nameInput = form['Last_Name'];
        if (nameInput && nameInput.value.replace(/^\s+|\s+$/g, '').length === 0) {
            alert("<?= TR['form_empty_field_warning'] ?>".replace("%s", nameInput.placeholder));
            nameInput.focus();
            return false;
        }

        const input = form['Phone'];
        const iti = window.intlTelInputGlobals.getInstance(input);
        const isPhoneNumberValid = iti.isValidNumber();
        if (!isPhoneNumberValid) {
            alert("<?= TR['form_phone_validation'] ?>")
            input.focus();
        }

        return isPhoneNumberValid;
    }
</script>