<?php /** @noinspection PhpConditionAlreadyCheckedInspection */
$enableLogging = false; // TODO: Reimplement logging service

if ($enableLogging): ?>
    <?php assert(defined('DR_NAME')) ?>
    <script>
        const webServiceURL = 'https://hotelistan-services.freeddns.org/api'
        const whatsAppLog = async (btnId, text, isSticky) =>
            await fetch(`${webServiceURL}/service/whatsapp?btn_id=${btnId}&btn_text=${text}&is_sticky=${isSticky}`, {
                credentials: 'include',
            })

        const websiteLog = async () => {
            const [url, params] = window.location.href.split(/\?(.*)/s, 2)
            const lang = document.querySelector('html').getAttribute('lang')

            await fetch(`${webServiceURL}/tracker?drname=<?= DR_NAME ?>&website=${url}&lang=${lang}&${params}`, {
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
<?php endif; ?>