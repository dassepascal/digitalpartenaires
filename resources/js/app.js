import "./bootstrap";

let sections = document.querySelectorAll("section");

window.addEventListener("scroll", () => {
    sections.forEach((sec) => {
        let scrollDistance = window.scrollY;
        let secDistance = sec.getBoundingClientRect().top + window.scrollY;

        if (scrollDistance >= secDistance - 150) {
            sec.classList.add("show-animate");
        } else {
            sec.classList.remove("show-animate");
        }
    });
});
