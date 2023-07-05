jQuery(function ($) {
    //играемся с якорями при открытии страницы
    if (document.querySelector(".page-services__link")) {
        var url = location.hash;
        var analyzes = "#analyzes";
        var diagnostics = "#diagnostics";
        var health = "#reproductive-health";
        var adults = "#adults";
        var kids = "#kids";
        var sales = "#sales";
        var search = "#search";

        if (url.indexOf(analyzes) > -1) {
            $(".page-services__link").removeClass(
                "page-services__link--active"
            );
            $(".page-services__link--analyzes").addClass(
                "page-services__link--active"
            );
            $(".page-services__item").removeClass(
                "page-services__item--active"
            );
            $("#page-services__item--analyzes").addClass(
                "page-services__item--active"
            );
        } else {
            if (url.indexOf(diagnostics) > -1) {
                $(".page-services__link").removeClass(
                    "page-services__link--active"
                );
                $(".page-services__link--diagnostics").addClass(
                    "page-services__link--active"
                );
                $(".page-services__item").removeClass(
                    "page-services__item--active"
                );
                $("#page-services__item--diagnostics").addClass(
                    "page-services__item--active"
                );
            } else {
                if (url.indexOf(adults) > -1) {
                    $(".page-services__link").removeClass(
                        "page-services__link--active"
                    );
                    $(".page-services__link--adults").addClass(
                        "page-services__link--active"
                    );
                    $(".page-services__item").removeClass(
                        "page-services__item--active"
                    );
                    $("#page-services__item--adults").addClass(
                        "page-services__item--active"
                    );
                } else {
                    if (url.indexOf(health) > -1) {
                        $(".page-services__link").removeClass(
                            "page-services__link--active"
                        );
                        $(".page-services__link--health").addClass(
                            "page-services__link--active"
                        );
                        $(".page-services__item").removeClass(
                            "page-services__item--active"
                        );
                        $("#page-services__item--health").addClass(
                            "page-services__item--active"
                        );
                    } else {
                        if (url.indexOf(kids) > -1) {
                            $(".page-services__link").removeClass(
                                "page-services__link--active"
                            );
                            $(".page-services__link--kids").addClass(
                                "page-services__link--active"
                            );
                            $(".page-services__item").removeClass(
                                "page-services__item--active"
                            );
                            $("#page-services__item--kids").addClass(
                                "page-services__item--active"
                            );
                        } else {
                            if (url.indexOf(sales) > -1) {
                                $(".page-services__link").removeClass(
                                    "page-services__link--active"
                                );
                                $(".page-services__link--sales").addClass(
                                    "page-services__link--active"
                                );
                                $(".page-services__item").removeClass(
                                    "page-services__item--active"
                                );
                                $("#page-services__item--sales").addClass(
                                    "page-services__item--active"
                                );
                            } else {
                                if (url.indexOf(search) > -1) {
                                    $(".page-services__link").removeClass(
                                        "page-services__link--active"
                                    );
                                    $(".page-services__item").removeClass(
                                        "page-services__item--active"
                                    );
                                    $("#page-services__item--search").addClass(
                                        "page-services__item--active"
                                    );
                                } else {
                                    $(".page-services__link").removeClass(
                                        "page-services__link--active"
                                    );
                                    $(
                                        ".page-services__link--analyzes"
                                    ).addClass("page-services__link--active");
                                    window.location.hash = "#analyzes";
                                    $(".page-services__item").removeClass(
                                        "page-services__item--active"
                                    );
                                    $(
                                        "#page-services__item--analyzes"
                                    ).addClass("page-services__item--active");
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    //играемся с якорями при клике
    if ($(".page-services__link")) {
        $(".page-services__link").click(function () {
            $(".page-services__link").removeClass(
                "page-services__link--active"
            );
            // $('.category__description').removeClass('category__description--active');
            $(this).addClass("page-services__link--active");
        });

        $(".page-services__link--analyzes").click(function () {
            $(".page-services__item").removeClass(
                "page-services__item--active"
            );
            $("#page-services__item--analyzes").addClass(
                "page-services__item--active"
            );
        });
        $(".page-services__link--diagnostics").click(function () {
            $(".page-services__item").removeClass(
                "page-services__item--active"
            );
            $("#page-services__item--diagnostics").addClass(
                "page-services__item--active"
            );
        });
        $(".page-services__link--adults").click(function () {
            $(".page-services__item").removeClass(
                "page-services__item--active"
            );
            $("#page-services__item--adults").addClass(
                "page-services__item--active"
            );
        });
        $(".page-services__link--kids").click(function () {
            $(".page-services__item").removeClass(
                "page-services__item--active"
            );
            $("#page-services__item--kids").addClass(
                "page-services__item--active"
            );
        });
        $(".page-services__link--health").click(function () {
            $(".page-services__item").removeClass(
                "page-services__item--active"
            );
            $("#page-services__item--health").addClass(
                "page-services__item--active"
            );
        });
        $(".page-services__link--sales").click(function () {
            $(".page-services__item").removeClass(
                "page-services__item--active"
            );
            $("#page-services__item--sales").addClass(
                "page-services__item--active"
            );
        });
        $("#services_search").click(function () {
            $(".page-services__link").removeClass(
                "page-services__link--active"
            );
            $(".page-services__item").removeClass(
                "page-services__item--active"
            );
            $("#page-services__item--search").addClass(
                "page-services__item--active"
            );
            window.location.hash = "#search";
        });
    }

    //сортировка по двум колонкам
    $(document).ready(function () {
        if ($(".page-services__item")) {
            $(".page-services__item").each(function () {
                $(this)
                    .children(".page-services__item-box")
                    .children(".page-services__category:nth-child(odd)")
                    .addClass("page-services__category-l");
                $(this)
                    .children(".page-services__item-box")
                    .children(".page-services__category:nth-child(even)")
                    .addClass("page-services__category-r");
                $(this)
                    .children(".page-services__item-box")
                    .children(".page-services__category-l")
                    .wrapAll("<div class='page-services__item-box-left' />");
                $(this)
                    .children(".page-services__item-box")
                    .children(".page-services__category-r")
                    .wrapAll("<div class='page-services__item-box-right' />");
            });
        }
    });

    //поиск по услугам
    $("#services_search").keyup(function () {
        var $value = $(this).val();

        if ($value != "") {
            $(".category__service-description-child").each(function (index) {
                $row = $(this);
                var services_title_child = $row
                    .find(".category__service-title-child")
                    .html();
                var reg = new RegExp($value, "i");
                if (services_title_child.match(reg)) {
                    $row.clone()
                        .appendTo(
                            "#page-services__item--search .page-services__category"
                        )
                        .mark($value);
                } else {
                    $("#page-services__item--search .page-services__category")
                        .find($row)
                        .remove();
                }
            });
            $(".category__service-description").each(function (index) {
                $row = $(this);
                var services_title = $row
                    .find(".category__service-title")
                    .html();
                var reg = new RegExp($value, "i");
                if (services_title.match(reg)) {
                    $row.clone()
                        .appendTo(
                            "#page-services__item--search .page-services__category"
                        )
                        .mark($value);
                } else {
                    $("#page-services__item--search .page-services__category")
                        .find($row)
                        .remove();
                }
            });
        } else {
            $(
                "#page-services__item--search .page-services__category .category__service-description"
            ).remove();
            $(
                "#page-services__item--search .page-services__category .category__service-description-child"
            ).remove();
        }
    });
});
