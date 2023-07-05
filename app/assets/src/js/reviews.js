jQuery(document).ready(function ($) {
    if (document.querySelector(".reviews__section")) {
        const Fee = async () => {
            fetch(
                "https://novosibirsk.flamp.ru/firm/zdorove_i_materinstvo_ooo_medicinskijj_centr-141265769633424"
            )
                .then(function (response) {
                    if (response.status !== 200) {
                        console.log(
                            "Looks like there was a problem. Status Code: " +
                                response.status
                        );
                        return;
                    }

                    // Examine the text in the response
                    response.json().then(function (data) {
                        console.log(data);
                    });
                })
                .catch(function (err) {
                    console.log("Fetch Error :-S", err);
                });
        };

        Fee();
    }
});
