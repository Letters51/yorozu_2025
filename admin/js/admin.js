window.addEventListener("load", function () {
    //store tabs variables
    var tabs = document.querySelectorAll("ul.nav-tabs>li");

    for (i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", switchTab);
    }

    function switchTab(event) {
        event.preventDefault;

        document.querySelector("ul.nav-tabs li.active").classList.remove("active");
        document.querySelector(".tab-content__pane.active").classList.remove("active");

        var clickedTab = event.currentTarget;
        console.log(clickedTab);
        var anchor = event.target;
        console.log(anchor);
        var activePaneID = anchor.getAttribute("href");
        console.log(activePaneID);

        clickedTab.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");
    }
}); 