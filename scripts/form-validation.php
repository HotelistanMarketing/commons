<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', event => {
            if (!formValidation(event.target))
                event.preventDefault()
        });
    })

    // TODO show in-place warning popups instead of alert dialogs
    function formValidation(form) {
        let isNameOptionalAndEmpty = false
        const nameInput = form['Last_Name'];
        if (nameInput && nameInput.value.replace(/^\s+|\s+$/g, '').length === 0) {
            if (form.hasAttribute("data-optional-name"))
                isNameOptionalAndEmpty = true
            else {
                alert("<?= TRC['form_empty_field_warning'] ?>".replace("%s", nameInput.placeholder));
                nameInput.focus();
                return false;
            }
        }

        const input = form['Phone'];
        const iti = window.intlTelInputGlobals.getInstance(input);
        const isPhoneNumberValid = iti.isValidNumber();
        if (!isPhoneNumberValid) {
            alert("<?= TRC['form_phone_validation'] ?>")
            input.focus();
        }

        if (isPhoneNumberValid && isNameOptionalAndEmpty) {
            // Empty values are displayed as 'Not Provided' on Zoho, but...
            // The King of the Lead Managers, Alperen, requested us to make it 'Unknown'.
            // So, submit empty value as 'Unknown' without showing it to user:
            nameInput.style.color = "transparent"
            nameInput.value = "Unknown"
        }

        if (isPhoneNumberValid) {
            const urlParams = new URLSearchParams(window.location.search)
            form.querySelectorAll("input[data-auto-fetch-param]").forEach(input => {
                input.value = urlParams.get(input.getAttribute("data-auto-fetch-param"))
            })
        }

        return isPhoneNumberValid;
    }
</script>