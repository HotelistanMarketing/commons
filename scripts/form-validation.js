const getWebsiteBaseURL = () => {
    const location = window.location.href
    return location.split('?')[0]
}

const abandonService = async (phoneNumber, website, nameInput, emailInput, leadSource, leadProcedure, leadInterest, leadLanguage) => {
    await fetch(
        `https://hotelistan-services.freeddns.org/api/service/abandon?phone=${phoneNumber}&website=${website}&name=${nameInput.value}&email=${emailInput.value}&&lead_source=${leadSource}&lead_lang=${leadLanguage}&lead_procedure=${leadProcedure}&lead_interest=${leadInterest}`,
        {credentials: 'include'}
    )
}

const abandonDeleteHandler = async (validNumber) => {
    await fetch(`https://hotelistan-services.freeddns.org/api/service/abandon/del?phone=${validNumber}`, {
        credentials: 'include',
    })
}

document.querySelectorAll('form').forEach((form) => {
    const nameInput = form['Last_Name']
    const mobileInput = form['Phone']
    const emailInput = form['Email']
    const leadSource = form['Lead_Source'].value
    const leadProcedure = form['LEADCF15'].value
    const leadInterest = form['LEADCF48'].value
    const leadLanguage = form['LEADCF2'].value

    const website = getWebsiteBaseURL()
    const iti = window.intlTelInputGlobals.getInstance(mobileInput)

    nameInput.addEventListener('input', (event) => {
        if (event.target.value.trim().length === 0) event.target.value = ''
    })

    // email change handler TODO: uncomment when email validation is needed
    //  emailInput.addEventListener('input', async (event) => {
    //       const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/

    //       if (event.target.value.match(validRegex) && iti.isValidNumber()) {
    //            const validNumber = iti.getNumber()

    //            await fetch(
    //                 `https://hotelistan-services.freeddns.org/api/service/abandon?phone=${validNumber}&website=${website}&name=${nameInput.value}&email=${event.target.value}`
    //            )
    //       }
    //  })

    // phone change handler
    mobileInput.addEventListener('input', async (event) => {
        event.target.setCustomValidity('')
        const isPhoneNumberValid = iti.isValidNumber()

        if (isPhoneNumberValid) {
            const phoneNumber = iti.getNumber()
            await abandonService(phoneNumber, website, nameInput, emailInput, leadSource, leadProcedure, leadInterest, leadLanguage)
        }
    })

    form.addEventListener('submit', (event) => {
        validateForm(event, iti)
    })
})

/**
 * @returns boolean whether all fields are valid (true) or not (false)
 */
async function validateForm(event, iti) {
    const form = event.target
    const mobileInput = form['Phone']
    const isPhoneNumberValid = iti.isValidNumber()

    if (!isPhoneNumberValid) {
        mobileInput.setCustomValidity(mobileInput.getAttribute('data-warning-msg'))
        mobileInput.reportValidity()
        event.preventDefault()
    }
    else {
        const nameInput = form['Last_Name']
        nameInput.value = nameInput.value.trim()

        if (nameInput.value.length === 0 && !nameInput.required) {
            // Empty values are displayed as 'Not Provided' on Zoho, but...
            // The King of the Lead Managers, Mr. Alperen, requested us to make it 'Unknown'.
            // So, submit empty value as 'Unknown' without showing it to user:
            nameInput.style.color = 'transparent'
            nameInput.value = 'Unknown'
        }

        const validNumber = iti.getNumber()
        await abandonDeleteHandler(validNumber)
        await createPatientsRecord(form, validNumber)
    }

    return isPhoneNumberValid
}

async function createPatientsRecord(form, validNumber) {
    const language = form.querySelector('#LEADCF2').value;

    await fetch(`https://zoho.hotelistan.net/api/form-patient`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            name: form.querySelector('#Last_Name').value,
            phone: validNumber,
            email: form.querySelector('#Email').value,
            lead_source: 'Google/Web Form',
            language: language,
            source_language: language,
            interest: [form.querySelector('#LEADCF48').value],
            procedure: [form.querySelector('#LEADCF15').value],
            doctor: form.querySelector('#DR').value,
            utm_source: form.querySelector('#LEADCF35').value,
            utm_medium: form.querySelector('#LEADCF36').value,
            utm_matchtype: form.querySelector('#LEADCF37').value,
            utm_keyword: form.querySelector('#LEADCF38').value,
            utm_network: form.querySelector('#LEADCF39').value,
            gclid: form.querySelector('#LEADCF40').value,
            ip:  form.querySelector('#ip').value,
        }),
    });
}
