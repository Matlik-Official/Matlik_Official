const toTop = document.querySelector(".toTop");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 500) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }
})

const scrollNav = document.querySelector(".scrollNav");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 99) {
        scrollNav.classList.add("scrollNav-active");
    } else if (window.pageYOffset < 100){
        scrollNav.classList.remove("scrollNav-active");
    }
})

const update_img_checkbox = document.querySelector("#update_img_checkbox");
const update_img_input = document.querySelector("#update_img_input");

update_img_checkbox.addEventListener("click", function() {
    if (update_img_checkbox.checked) {
        update_img_input.classList.remove("hidden");
    } else {
        update_img_input.classList.add("hidden");
    }
});