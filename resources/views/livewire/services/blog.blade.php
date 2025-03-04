<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div style="max-width: 700px; margin: 0 auto;">
    <x-card title="Blog" subtitle="Our findings about you" shadow separator>
        I have title, subtitle, separator and shadow.
    </x-card>
     
    <x-card title="Nice things">
        I am using slots here.
     
        <x-slot:figure>
            <img src="https://picsum.photos/500/200" />
        </x-slot:figure>
        {{-- <x-slot:menu>
            <x-button icon="o-share" class="btn-circle btn-sm" />
            <x-icon name="o-heart" class="cursor-pointer" />
        </x-slot:menu>
         --}}
    </x-card>
</div>
