import './bootstrap';

function animateOnScroll() {
    const sections = document.querySelectorAll('section');
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show-animate');
                } else {
                    entry.target.classList.remove('show-animate');
                }
            });
        },
        { threshold: 0.1 }
    );
    sections.forEach(section => {
        observer.observe(section);
    });
}

document.addEventListener('DOMContentLoaded', animateOnScroll);
document.addEventListener('livewire:navigated', animateOnScroll);
