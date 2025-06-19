<?php

use Livewire\Volt\Component;

new class extends Component {
    public function mount()
    {
        $this->dispatch('init-scroll-animation'); // Utilise dispatch au lieu de dispatchBrowserEvent
    }
};
?>

<div>
    <section class="sec1 min-h-screen flex flex-col justify-center items-center bg-[#1f242d] overflow-hidden show-animate">
        <h1 class="animate text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white text-center">Première Section</h1>
        <p class="animate text-lg sm:text-xl md:text-2xl font-semibold text-[#0ef] text-center mt-4">animation au défilement HTML, CSS & JavaScript</p>
    </section>

    <section class="sec2 min-h-screen flex flex-col justify-center items-center bg-[rgb(96,30,158)] overflow-hidden">
        <h1 class="animate text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white text-center">Deuxième Section</h1>
        <p class="animate text-lg sm:text-xl md:text-2xl font-semibold text-[#0f0] text-center mt-4">animation au défilement HTML, CSS & JavaScript</p>
    </section>

    <section class="sec3 min-h-screen flex flex-col justify-center items-center bg-[#056964] overflow-hidden">
        <h1 class="animate text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white text-center">Troisième Section</h1>
        <p class="animate text-lg sm:text-xl md:text-2xl font-semibold text-[#ff0] text-center mt-4">animation au défilement HTML, CSS & JavaScript</p>
    </section>

    <section class="sec4 min-h-screen flex flex-col justify-center items-center bg-[#ffa600] overflow-hidden">
        <h1 class="animate text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white text-center">Quatrième Section</h1>
        <p class="animate text-lg sm:text-xl md:text-2xl font-semibold text-[#056964] text-center mt-4">animation au défilement HTML, CSS & JavaScript</p>
    </section>

    <section class="sec5 min-h-screen flex flex-col justify-center items-center bg-[rgb(255,0,85)] overflow-hidden">
        <div class="images flex flex-col sm:flex-row gap-4 sm:gap-10 justify-center items-center">
            <img src="{{ asset('storage/photos/img04.jpg') }}" class="animate w-full sm:max-w-[350px] h-auto object-cover" loading="lazy" alt="Image 5">
            <img src="{{ asset('storage/photos/img06.jpg') }}" class="animate w-full sm:max-w-[350px] h-auto object-cover" loading="lazy" alt="Image 6">
            <img src="{{ asset('storage/photos/img07.jpg') }}" class="animate w-full sm:max-w-[350px] h-auto object-cover" loading="lazy" alt="Image 7">
        </div>
    </section>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Base animation styles */
        section .animate {
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
            will-change: opacity, transform;
        }

        section.show-animate .animate {
            opacity: 1;
        }

        /* Section 2: Slide in from right */
        .sec2 .animate {
            transform: translateX(100%);
        }

        .sec2.show-animate .animate {
            transform: translateX(0);
        }

        /* Section 3: Scale effect */
        .sec3 .animate {
            transform: scale(0.7);
        }

        .sec3.show-animate .animate {
            transform: scale(1);
        }

        /* Section 4: Rotate effect */
        .sec4 .animate {
            transform: rotate(30deg);
        }

        .sec4.show-animate .animate {
            transform: rotate(0deg);
        }

        /* Section 5: Slide and rotate effect for images */
        .sec5 .animate {
            transform: translateX(100%) rotate(-90deg);
        }

        .sec5.show-animate .animate {
            transform: translateX(0) rotate(0deg);
        }

        /* Delay for animations */
        p.animate {
            transition-delay: 0.2s;
        }

        .sec5 img:nth-child(2) {
            transition-delay: 0.2s;
        }

        .sec5 img:nth-child(3) {
            transition-delay: 0.4s;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            section .animate {
                opacity: 1;
                transform: none;
                transition: none; /* Disable animations on mobile for performance */
            }

            .images {
                padding: 1rem;
            }

            h1 {
                font-size: clamp(2rem, 8vw, 3rem); /* Responsive font size */
            }

            p {
                font-size: clamp(1rem, 4vw, 1.5rem);
                margin-top: 1rem;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            h1 {
                font-size: clamp(3rem, 10vw, 5rem);
            }

            p {
                font-size: clamp(1.25rem, 5vw, 1.75rem);
            }
        }
    </style>

    @push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('init-scroll-animation', () => {
                const sections = document.querySelectorAll('section');
                const observerOptions = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('show-animate');
                            observer.unobserve(entry.target); // Stop observing once animated
                        }
                    });
                }, observerOptions);

                sections.forEach(section => observer.observe(section));
            });
        });
    </script>
    @endpush
</div>
