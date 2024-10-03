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
    if (screen.width > 600) {
        getH = window.innerHeight;
        if (getH != iniheight) {
            setFullHeight();
        }
    }
})

window.addEventListener('orientationchange', function () {
    setFullHeight();
})