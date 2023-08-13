const mobileInput = document.querySelector("#Mobile");
const countryInput = document.querySelector("#Country");
const iti = window.intlTelInput(mobileInput, {
    initialCountry: "auto",
    autoPlaceholder: "on",
    geoIpLookup: function (callback) {
        // TODO medium security issue - publicly visible api key here!
        fetch("https://api.ipgeolocation.io/ipgeo?apiKey=422275249a7e4de6ab10a264a99114f8&fields=geo")
            .then(function (res) {
                return res.json();
            })
            .then(function (data) {
                callback(data?.country_code2 ?? "us");
            })
            .catch(function (reason) {
                callback("us");
                console.error(reason)
            });
    },

    nationalMode: false,
    autoInsertDialCode: true,
    autoHideDialCode: false,
    separateDialCode: false,
    preferredCountries: ['gb', 'tr', 'fr', 'sa', 'us', 'de', 'se', 'be', 'kw', 'ae', 'qa', 'nl'],
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
});

mobileInput.addEventListener('countrychange', function (e) {
    const countryName = iti.getSelectedCountryData().name;
    countryInput.value = countryName.replace(/.+\((.+)\)/, "$1");
});
