const API_URL = 'https://hotelistan-services.freeddns.org/api';
const ZOHO_API_URL = 'https://zoho.hotelistan.net/api/form-patient';

document.querySelectorAll('form').forEach((form) => {
    const nameInput = form['Name']
    const mobileInput = form['Phone']
    const iti = window.intlTelInputGlobals.getInstance(mobileInput)

    nameInput.addEventListener('input', (event) => {
        if (event.target.value.trim().length === 0)
            event.target.value = ''
    })

    mobileInput.addEventListener('input', async (event) => {
        event.target.setCustomValidity('')

        // TODO: Uncomment the following lines to enable form abandon service
        // if (iti.isValidNumber())
        //    await abandonService(nameInput.value, iti.getNumber(), form)
    })

    form.addEventListener('submit', async (event) => {
        event.preventDefault()

        if (!validateForm(form, iti.isValidNumber()))
            return

        const submitButton = form.querySelector('button[type="submit"]')
        submitButton.setAttribute('disabled', 'true')

        const validNumber = iti.getNumber()
        await createPatientsRecord(form, validNumber)
        // await abandonDeleteHandler(validNumber)
        // TODO: Uncomment the above line to enable abandon delete handler

        form.submit()
        submitButton.removeAttribute('disabled')
        window.location.href = form['returnURL'].value
    })
})

// noinspection JSUnusedGlobalSymbols
const abandonService = async (name, phone, form) => {
    const params = new URLSearchParams({
        name: name,
        phone: phone,
        email: form['Email'].value,
        lead_lang: form['Language'].value,
        lead_source: form['Source'].value,
        lead_interest: form['Interest'].value,
        lead_procedure: form['Procedure'].value,
        website: `${window.location.origin}${window.location.pathname}`,
    });

    await fetch(`${API_URL}/service/abandon?${params.toString()}`, {
        credentials: 'include'
    });
}

// noinspection JSUnusedGlobalSymbols
const abandonDeleteHandler = async (validNumber) => {
    await fetch(`${API_URL}/service/abandon/del?phone=${validNumber}`, {
        credentials: 'include'
    })
}

/**
 * @returns boolean whether all fields are valid (true) or not (false)
 */
function validateForm(form, isValidNumber) {
    if (!isValidNumber) {
        const mobileInput = form['Phone']
        mobileInput.setCustomValidity(mobileInput.getAttribute('data-warning-msg'))
        mobileInput.reportValidity()
        return false
    }

    const nameInput = form['Name']
    nameInput.value = nameInput.value.trim()

    if (nameInput.value.length === 0 && !nameInput.required) {
        // Empty values are displayed as 'Not Provided' on Zoho, but...
        // The King of the Lead Managers, Mr. Alperen, requested us to make it 'Unknown'.
        // So, submit empty value as 'Unknown' without showing it to user:
        nameInput.style.color = 'transparent'
        nameInput.value = 'Unknown'
    }

    return true
}

async function createPatientsRecord(form, validNumber) {
    const language = form['Language'].value;

    await fetch(ZOHO_API_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            name: form['Name'].value,
            phone: validNumber,
            email: form['Email'].value,
            lead_source: 'Google/Web Form',
            language: language,
            source_language: language,
            interest: [form['Interest'].value],
            procedure: [form['Procedure'].value],
            doctor: form['Doctor'].value,
            utm_source: form['utm_source'].value,
            utm_medium: form['utm_medium'].value,
            utm_matchtype: form['utm_matchtype'].value,
            utm_keyword: form['utm_keyword'].value,
            utm_network: form['utm_network'].value,
            gclid: form['gclid'].value,
            ip: form['ip'].value,
        }),
    });
}
