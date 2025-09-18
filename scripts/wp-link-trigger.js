/**
 * @author Gündüz (muharrem.yel@hotelistan.com)
 * @description Add a special "wp-link" class to all objects linked to WhatsApp so that we can track conversions.
 */

const wp_links = document.querySelectorAll('a[href^="https://wa.me"]')
for (let i = 0; i < wp_links.length; i++)
    wp_links[i].classList.add('wp-link')