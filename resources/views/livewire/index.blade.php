<?php

use Livewire\Volt\Component;

new class extends Component {
    public function mount()
    {
        $this->dispatch('init-scroll-animation');
    }
};
?>

<div>
    <section class="sec1 min-h-screen flex flex-col justify-center items-center">
        <h1 class="animate-h1-sec1 text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white text-center">Première Section</h1>
        <p class="animate-p animate text-lg sm:text-xl md:text-2xl font-semibold text-[#0ef] text-center mt-4">animation au défilement HTML, CSS & JavaScript</p>
    </section>
    <section class="sec2 min-h-screen flex flex-col justify-center items-center">
        <h1 class="animate-h1-sec2 text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white text-center">Deuxième Section</h1>
        <p class="animate-p animate text-lg sm:text-xl md:text-2xl font-semibold text-[#0f0] text-center mt-4">animation au défilement HTML, CSS & JavaScript</p>
    </section>
    <section class="sec3 min-h-screen flex flex-col justify-center items-center">
        <h1 class="animate-h1-sec3 text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white text-center">Troisième Section</h1>
        <p class="animate-p animate text-lg sm:text-xl md:text-2xl font-semibold text-[#ff0] text-center mt-4">animation au défilement HTML, CSS & JavaScript</p>
    </section>
    <section class="sec4 min-h-screen flex flex-col justify-center items-center">
        <h1 class="animate-h1-sec4 text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white text-center">Quatrième Section</h1>
        <p class="animate-p animate text-lg sm:text-xl md:text-2xl font-semibold text-[#056964] text-center mt-4">animation au défilement HTML, CSS & JavaScript</p>
    </section>
    <section class="sec5 min-h-screen flex flex-col justify-center items-center">
        <div class="images flex flex-col sm:flex-row gap-4 sm:gap-10 justify-center items-center">
            <img src="{{ asset('storage/photos/img04.jpg') }}" class="animate w-full sm:max-w-[350px] h-auto object-cover" loading="lazy" alt="Image 5">
            <img src="{{ asset('storage/photos/img06.jpg') }}" class="animate w-full sm:max-w-[350px] h-auto object-cover" loading="lazy" alt="Image 6">
            <img src="{{ asset('storage/photos/img07.jpg') }}" class="animate w-full sm:max-w-[350px] h-auto object-cover" loading="lazy" alt="Image 7">
        </div>
    </section>
</div>
