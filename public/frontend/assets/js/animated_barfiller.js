/**
 * jQuery Barfiller Plugin
 */
(function ($) {
    "use strict";

    $.fn.barfiller = function (options) {
        var settings = $.extend(
            {
                barColor: "#16a085",
                backgroundColor: "#e0e0e0",
                tooltip: true,
                tooltipColor: "#000",
                duration: 1000,
                animateOnResize: true,
                barHeight: 8,
                borderRadius: 5,
            },
            options
        );

        return this.each(function () {
            var $this = $(this);
            var $fill = $this.find(".fill");
            var $tip = $this.find(".tip");
            var percentage = $fill.data("percentage") || 0;

            $this.css({
                position: "relative",
                width: "100%",
                height: settings.barHeight + "px",
                "background-color": settings.backgroundColor,
                "border-radius": settings.borderRadius + "px",
                overflow: "hidden",
            });

            $fill.css({
                display: "block",
                position: "relative",
                width: "0%",
                height: "100%",
                "background-color": settings.barColor,
                "border-radius": settings.borderRadius + "px",
                transition: "width " + settings.duration + "ms ease-in-out",
            });

            if (settings.tooltip) {
                var $tipWrap = $this.find(".tipWrap");

                $tipWrap.css({
                    position: "absolute",
                    top: "-30px",
                    left: "0%",
                    transition: "left " + settings.duration + "ms ease-in-out",
                    "z-index": "10",
                });

                $tip.css({
                    display: "inline-block",
                    padding: "5px 10px",
                    "background-color": settings.tooltipColor,
                    color: "#fff",
                    "border-radius": "3px",
                    "font-size": "12px",
                    "font-weight": "bold",
                    "white-space": "nowrap",
                    position: "relative",
                    left: "-50%",
                });

                $tip.append(
                    '<span style="position: absolute; bottom: -5px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 5px solid transparent; border-right: 5px solid transparent; border-top: 5px solid ' +
                        settings.tooltipColor +
                        ';"></span>'
                );

                $tip.text(percentage + "%");
            }

            function animate() {
                setTimeout(function () {
                    $fill.css("width", percentage + "%");

                    if (settings.tooltip) {
                        $this.find(".tipWrap").css("left", percentage + "%");
                    }
                }, 100);
            }

            animate();

            if (settings.animateOnResize) {
                $(window).on("resize", function () {
                    animate();
                });
            }

            $this.data("updatePercentage", function (newPercentage) {
                percentage = newPercentage;
                $fill.data("percentage", newPercentage);
                $tip.text(newPercentage + "%");
                animate();
            });
        });
    };
})(jQuery);
