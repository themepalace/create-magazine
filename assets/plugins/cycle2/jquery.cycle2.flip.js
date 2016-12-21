/* Plugin for Cycle2; Copyright (c) 2012 M. Alsup; v20141007 */ 

! function(a) {
    "use strict";

    function b(b) {
        return {
            preInit: function(a) {
                a.slides.css(d)
            },
            transition: function(c, d, e, f, g) {
                var h = c,
                    i = a(d),
                    j = a(e),
                    k = h.speed / 2;
                b.call(j, -90), j.css({
                    display: "block",
                    visibility: "visible",
                    "background-position": "-90px",
                    opacity: 1
                }), i.css("background-position", "0px"), i.animate({
                    backgroundPosition: 90
                }, {
                    step: b,
                    duration: k,
                    easing: h.easeOut || h.easing,
                    complete: function() {
                        c.API.updateView(!1, !0), j.animate({
                            backgroundPosition: 0
                        }, {
                            step: b,
                            duration: k,
                            easing: h.easeIn || h.easing,
                            complete: g
                        })
                    }
                })
            }
        }
    }

    function c(b) {
        return function(c) {
            var d = a(this);
            d.css({
                "-webkit-transform": "rotate" + b + "(" + c + "deg)",
                "-moz-transform": "rotate" + b + "(" + c + "deg)",
                "-ms-transform": "rotate" + b + "(" + c + "deg)",
                "-o-transform": "rotate" + b + "(" + c + "deg)",
                transform: "rotate" + b + "(" + c + "deg)"
            })
        }
    }
    var d, e = document.createElement("div").style,
        f = a.fn.cycle.transitions,
        g = void 0 !== e.transform || void 0 !== e.MozTransform || void 0 !== e.webkitTransform || void 0 !== e.oTransform || void 0 !== e.msTransform;
    g && void 0 !== e.msTransform && (e.msTransform = "rotateY(0deg)", e.msTransform || (g = !1)), g ? (f.flipHorz = b(c("Y")), f.flipVert = b(c("X")), d = {
        "-webkit-backface-visibility": "hidden",
        "-moz-backface-visibility": "hidden",
        "-o-backface-visibility": "hidden",
        "backface-visibility": "hidden"
    }) : (f.flipHorz = f.scrollHorz, f.flipVert = f.scrollVert || f.scrollHorz)
}(jQuery);