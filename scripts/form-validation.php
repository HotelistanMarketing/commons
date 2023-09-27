<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', event => {
            if (!formValidation(event.target))
                event.preventDefault()
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

        if (isPhoneNumberValid) {
            const urlParams = new URLSearchParams(window.location.search)
            form.querySelectorAll("input[name^='utm_']").forEach(input => {
                input.value = urlParams.get(input.name)
            })
        }

        return isPhoneNumberValid;
    }
</script>