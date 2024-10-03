/******************************
 *
 *
 *  control sp menu
 *
 *
 ******************************/

const button = document.getElementById("sp-menu-toggle");
const sp_global_nav = document.getElementsByClassName("global_nav");
const global_nav_link = document.querySelector(".global_nav__list a");

button.addEventListener("click", function (e) {
	e.preventDefault();
	this.classList.toggle("is-active");
	sp_global_nav[0].classList.toggle("show");
});

Array.prototype.forEach.call(global_nav_link, function (bt) {
	bt.addEventListener("click", function (e) {
		button.classList.toggle("is-active");
		sp_global_nav[0].classList.toggle("show");
	});
});
