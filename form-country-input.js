
// $("#formSend").on("click", function (e) {
//     // var name = $("#getForm").find("#name").val().length;
//     // var phone_get = $("#getForm").find("#Mobile").val().length;
//     // if (name == 0 && phone_get == 3) {
//     //     $("#getForm").find(".name-error").show(300);
//     //     $("#getForm").find(".phone-error").show(300);
//     // }
//     // if (name <= 3) {
//     //     $("#getForm").find(".name-error").show(300);
//     // }
//     // if (name >= 3) {
//     //     $("#getForm").find(".name-error").hide(300);
//     // }
//     // if (phone_get <= 8) {
//     //     $("#getForm").find(".phone-error").show(300);
//     // } else {
//     $("#getForm").find(".submit").trigger("click");
// }

$(document).ready(function () {
    const input = document.querySelector("#Mobile");
    const country = document.querySelector("#Country");
    const countryData = window.intlTelInputGlobals.getCountryData();
    const iti = window.intlTelInput(input, {
        autoHideDialCode: false,
        autoPlaceholder: "on",
        geoIpLookup: function (callback) {
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
    input.addEventListener('countrychange', function (e) {
        const countryName = iti.getSelectedCountryData().name;
        country.value = countryName.replace(/.+\((.+)\)/, "$1");
    });
});
