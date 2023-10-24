document.querySelectorAll('form').forEach(form => {
    const nameInput = form['Last_Name']
    const mobileInput = form['Phone']

    nameInput.addEventListener('input', event => {
        if (event.target.value.trim().length === 0)
            event.target.value = ""
    })

    mobileInput.addEventListener('input', event => event.target.setCustomValidity(''))

    form.addEventListener('submit', event => {
        if (!formValidation(event.target))
            event.preventDefault()
    })
})

/**
 * @returns boolean whether all fields are valid (true) or not (false)
 */
function formValidation(form) {
    const mobileInput = form['Phone']
    const iti = window.intlTelInputGlobals.getInstance(mobileInput)
    const isPhoneNumberValid = iti.isValidNumber()

    if (!isPhoneNumberValid) {
        mobileInput.setCustomValidity(mobileInput.getAttribute('data-warning-msg'))
        mobileInput.reportValidity()
    }
    else {
        const nameInput = form['Last_Name']
        nameInput.value = nameInput.value.trim()
        if (nameInput.value.length === 0 && !nameInput.required) {
            // Empty values are displayed as 'Not Provided' on Zoho, but...
            // The King of the Lead Managers, Mr. Alperen, requested us to make it 'Unknown'.
            // So, submit empty value as 'Unknown' without showing it to user:
            nameInput.style.color = "transparent"
            nameInput.value = "Unknown"
        }
    }

    return isPhoneNumberValid
}
