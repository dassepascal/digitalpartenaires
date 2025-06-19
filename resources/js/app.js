import "./bootstrap";

let observer = null;

function handleScrollAnimations() {
    if (observer) {
        observer.disconnect();
    }

    const sections = document.querySelectorAll("section");
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                entry.target.classList.toggle(
                    "show-animate",
                    entry.isIntersecting
                );
            });
        },
        {
            threshold: 0.1,
            rootMargin: "50px",
        }
    );

    sections.forEach((section) => observer.observe(section));
}

// ⚡️ Hook custom sur page d’accueil
// window.addEventListener("init-scroll-animation", () => {
//     document.querySelectorAll("section").forEach((section) => {
//         section.classList.remove("show-animate");
//     });

//     void document.body.offsetWidth; // Hack: force le reflow
//     handleScrollAnimations();
// });

document.addEventListener("DOMContentLoaded", handleScrollAnimations);
document.addEventListener("livewire:navigated", () => {
    document.querySelectorAll("section").forEach((section) => {
        section.classList.remove("show-animate");
    });
    handleScrollAnimations();
});

window.addEventListener("beforeunload", () => {
    if (observer) {
        observer.disconnect();
        observer = null;
    }
});

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
