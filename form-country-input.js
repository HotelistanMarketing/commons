const mobileInput = document.querySelector("#Mobile");
const countryInput = document.querySelector("#Country");
const iti = window.intlTelInput(mobileInput, {
    autoHideDialCode: false,
    autoPlaceholder: "on",
    geoIpLookup: function (callback) {
        // TODO use vanilla JS instead!
        $.get("https://api.ipgeolocation.io/ipgeo?apiKey=422275249a7e4de6ab10a264a99114f8&fields=geo", function () {
        }, "json").always(function (resp) {
            const countryCode = (resp && resp.country_code2) ? resp.country_code2 : "";
            callback(countryCode);
        });
    },
    initialCountry: "auto",
    nationalMode: false,
    preferredCountries: ['gb', 'tr', 'fr', 'sa', 'us', 'de', 'se', 'be', 'kw', 'ae', 'qa', 'nl'],
    separateDialCode: false,
    utilsScript: "https://lp.dentfixturkey.com/veneer-turkey/assets/js/utils.js",
});

mobileInput.addEventListener('countrychange', function (e) {
    const countryName = iti.getSelectedCountryData().name;
    countryInput.value = countryName.replace(/.+\((.+)\)/, "$1");
});
