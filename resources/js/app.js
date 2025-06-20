import "./bootstrap";

let observer = null;

function handleScrollAnimations() {
    if (observer) {
        observer.disconnect();
    }

    const sections = document.querySelectorAll("section");
    observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show-animate");
                    obs.unobserve(entry.target); // On n'observe plus après animation
                }
            });
        },
        {
            threshold: 0.1,
            rootMargin: "0px",
        }
    );

    sections.forEach((section) => {
        section.classList.remove("show-animate");
        observer.observe(section);
    });
}

document.addEventListener("DOMContentLoaded", handleScrollAnimations);
document.addEventListener("livewire:navigated", handleScrollAnimations);
window.addEventListener("beforeunload", () => {
    if (observer) {
        observer.disconnect();
        observer = null;
    }
});
