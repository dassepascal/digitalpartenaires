<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>


<div>
    <section class="sec1 min-h-screen flex flex-col justify-center items-center bg-[#1f242d] overflow-hidden show-animate">
        <h1 class="animate text-[90px] font-bold text-white">Première Section</h1>
        <p class="animate text-[35px] font-semibold text-[#0ef]">animation au défilement HTML, CSS & JavaScript</p>
    </section>

    <section class="sec2 min-h-screen flex flex-col justify-center items-center bg-[rgb(96,30,158)] overflow-hidden">
        <h1 class="animate text-[90px] font-bold text-white">Deuxième Section</h1>
        <p class="animate text-[35px] font-semibold text-[#0f0]">animation au défilement HTML, CSS & JavaScript</p>
    </section>

    <section class="sec3 min-h-screen flex flex-col justify-center items-center bg-[#056964] overflow-hidden">
        <h1 class="animate text-[90px] font-bold text-white">Troisième Section</h1>
        <p class="animate text-[35px] font-semibold text-[#ff0]">animation au défilement HTML, CSS & JavaScript</p>
    </section>

    <section class="sec4 min-h-screen flex flex-col justify-center items-center bg-[#ffa600] overflow-hidden">
        <h1 class="animate text-[90px] font-bold text-white">Quatrième Section</h1>
        <p class="animate text-[35px] font-semibold text-[#056964]">animation au défilement HTML, CSS & JavaScript</p>
    </section>

    <section class="sec5 min-h-screen flex flex-col justify-center items-center bg-[rgb(255,0,85)] overflow-hidden">
        <div class="images flex gap-10">
            <img src="{{ asset('storage/photos/img05.jpg') }}" class="animate max-w-[350px]" loading="lazy">
            <img src="{{ asset('storage/photos/img06.jpg') }}" class="animate max-w-[350px]" loading="lazy">
            <img src="{{ asset('storage/photos/img07.jpg') }}" class="animate max-w-[350px]" loading="lazy">
        </div>
    </section>

    <script>
        let observer = null;

        function handleScrollAnimations() {
            if (observer) {
                observer.disconnect();
            }

            const sections = document.querySelectorAll('section');
            observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    entry.target.classList.toggle('show-animate', entry.isIntersecting);
                });
            }, {
                threshold: 0.1,
                rootMargin: '50px'
            });

            sections.forEach(section => observer.observe(section));
        }

        document.addEventListener('DOMContentLoaded', handleScrollAnimations);
        document.addEventListener('livewire:navigated', () => {
            document.querySelectorAll('section').forEach(section => {
                section.classList.remove('show-animate');
            });
            handleScrollAnimations();
        });

        window.addEventListener('beforeunload', () => {
            if (observer) {
                observer.disconnect();
                observer = null;
            }
        });
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        section .animate {
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
            will-change: opacity, transform;
        }

        section.show-animate .animate {
            opacity: 1;
        }

        .sec2 .animate {
            transform: translateX(100%);
        }

        .sec2.show-animate .animate {
            transform: translateX(0);
        }

        .sec3 .animate {
            transform: scale(0.7);
        }

        .sec3.show-animate .animate {
            transform: scale(1);
        }

        .sec4 .animate {
            transform: rotate(30deg);
        }

        .sec4.show-animate .animate {
            transform: rotate(0deg);
        }

        .sec5 .animate {
            transform: translateX(100%) rotate(-90deg);
        }

        .sec5.show-animate .animate {
            transform: translateX(0) rotate(0deg);
        }

        p.animate {
            transition-delay: 0.2s;
        }

        .sec5 img:nth-child(2) {
            transition-delay: 0.2s;
        }

        .sec5 img:nth-child(3) {
            transition-delay: 0.4s;
        }

        .sec5 img {
            max-width: 350px;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            section .animate {
                transition: none;
                opacity: 1;
                transform: none;
            }
        }
    </style>
</div>
