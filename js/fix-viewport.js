/**
 * 
 *  variables
 */

var anflag = {
    breakpoint: 600
}


/******************************
 * 
 *
 *  change viewport 
 *  when window size is resized.
 *
 ******************************/
function is_pc() {
    return screen.width > anflag.breakpoint;
}
const viewport_meta = document.getElementById('viewport-meta');
const viewports = {
    default: viewport_meta.getAttribute('content'),
    landscape: 'width=1280'
};
var set_viewport;
var setViewport = function () {
    if (is_pc()) {
        viewport_meta.setAttribute('content', viewports.landscape);
    } else {
        viewport_meta.setAttribute('content', viewports.default);
    }
    return false;
}
set_viewport = setViewport();
window.onresize = function () {
    set_viewport = setViewport();
}

/******************************
 * 
 *
 * set full heiht
 *
 * 
 ******************************/
function setFullHeight(h) {
    h = window.innerHeight;
    document.documentElement.style.setProperty('--fullvh', h + 'px');
    return h;
}

(function () {
    var winHeight;
    var changedHeight;

    winHeight = setFullHeight(winHeight);

    window.addEventListener('resize', function () {
        if (screen.width > 600) {
            changedHeight = window.innerHeight;
            if (changedHeight != winHeight) {
               winHeight = setFullHeight(winHeight);
            }
        }
    })

    window.addEventListener('orientationchange', function () {
        winHeight = setFullHeight(winHeight);
    })
})();