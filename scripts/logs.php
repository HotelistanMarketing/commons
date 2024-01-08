<?php
assert(defined('DR_NAME'))
?>

<script>
    const whatsAppLog = async (btn_id, text, isSticky) =>
        await fetch(`https://hotelistan-services.freeddns.org/api/service/whatsapp?btn_id=${btn_id}&btn_text=${text}&is_sticky=${isSticky}`, {
            credentials: 'include',
        })

    const websiteLog = async () => {
        let location = window.location.href
        const website = location.split('?')[0]
        const queries = location.split('?')[1]
        const lang = document.querySelector('html').getAttribute('lang')

        await fetch(`https://hotelistan-services.freeddns.org/api/tracker?drname=<?= DR_NAME ?>&website=${website}&lang=${lang}&${queries}`, {
            credentials: 'include',
        })
    }

    window.addEventListener('load', async () => {
        await websiteLog()
        setTimeout(() => {
            const btns = document.querySelectorAll('.wp-link')
            btns.forEach((btn, index) => {
                btn.addEventListener('click', (e) => {
                    if (btn.getAttribute('id') === 'whatsapp-fab') {
                        return whatsAppLog(index, btn.innerText, true)
                    }
                    return whatsAppLog(index, btn.innerText, false)
                })
            })
        }, 1000)
    })
</script>