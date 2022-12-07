(function () {
    var rotate, timeline;

    rotate = function () {
        return $(".car-card:first-child")
            .fadeOut(700, "swing", function () {
                return $(".car-card:first-child")
                    .appendTo(".carousel-container")
                    .hide();
            })
            .fadeIn(700, "swing");
    };

    timeline = setInterval(rotate, 3000);

    $(".car-card").click(function () {
        return rotate();
    });
}.call(this));
