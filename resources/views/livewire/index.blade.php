<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<!-- {{-- @if ()
<x-header title="{{ __('Posts for category ') }} {{ $category->title }}" size="text-2xl sm:text-3xl md:text-4xl" />
@endif --}} -->



<!-- resources/views/livewire/index.blade.php -->
<div>
    <section class="sec1 min-h-screen flex flex-col justify-center items-center bg-[#1f242d] overflow-hidden show-animate">
        <h1 class="animate text-[90px] font-bold text-white">First Section</h1>
        <p class="animate text-[35px] font-semibold text-[#0ef]">animation on scroll HTML, CSS & javascript</p>
    </section>

    <section class="sec2 min-h-screen flex flex-col justify-center items-center bg-[rgb(96,30,158)] overflow-hidden">
        <h1 class="animate text-[90px] font-bold text-white">Second Section</h1>
        <p class="animate text-[35px] font-semibold text-[#0f0]">animation on scroll HTML, CSS & javascript</p>
    </section>

    <section class="sec3 min-h-screen flex flex-col justify-center items-center bg-[#056964] overflow-hidden">
        <h1 class="animate text-[90px] font-bold text-white">Third Section</h1>
        <p class="animate text-[35px] font-semibold text-[#ff0]">animation on scroll HTML, CSS & javascript</p>
    </section>

    <section class="sec4 min-h-screen flex flex-col justify-center items-center bg-[#ffa600] overflow-hidden">
        <h1 class="animate text-[90px] font-bold text-white">Fourth Section</h1>
        <p class="animate text-[35px] font-semibold text-[#056964]">animation on scroll HTML, CSS & javascript</p>
    </section>

    <section class="sec5 min-h-screen flex flex-col justify-center items-center bg-[rgb(255,0,85)] overflow-hidden">
        <div class="images flex gap-10">
            <img src="{{ asset('storage/photos/img05.jpg') }}" class="animate max-w-[350px]">
            <img src="{{ asset('storage/photos/img06.jpg') }}" class="animate max-w-[350px]">
            <img src="{{ asset('storage/photos/img07.jpg') }}" class="animate max-w-[350px]">
        </div>
    </section>

    <script>
   
    </script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    /* Animations exactes des fichiers d'origine */
    section .animate {
        opacity: 0;
        filter: blur(5px);
        transition: 0.5s;
    }

    section.show-animate魔 .animate {
        opacity: 1;
        filter: blur(0px);
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
    </style>
</div>


