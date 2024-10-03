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
var iniheight;
var getH;

function setFullHeight() {
    var winHeight = window.innerHeight;
    document.documentElement.style.setProperty('--fullvh', winHeight + 'px');
    iniheight = window.innerHeight;

}
setFullHeight();

window.addEventListener('resize', function () {
    if (screen.width > anflag.breakpoint) {
        getH = window.innerHeight;
        if (getH != iniheight) {
            setFullHeight();
        }
    }
})

window.addEventListener('orientationchange', function () {
    setFullHeight();
})