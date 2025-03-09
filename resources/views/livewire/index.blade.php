<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

{{-- @if ()
<x-header title="{{ __('Posts for category ') }} {{ $category->title }}" size="text-2xl sm:text-3xl md:text-4xl" />
@endif --}}



<div class="container mx-auto max-w-[700px]">

    @if (session('registered'))
        <x-alert 
            title="{!! session('registered') !!}" 
            icon="s-rocket-launch" 
            class="mb-4 alert-info" 
            dismissible 
        />
    @endif
  
     
    <x-card  title="Présentation de l'agence" >
        
     
        <x-slot:figure>
            <img src="{{ asset('storage/photos/pre2.jpg')}}" alt="pre2" />
        </x-slot:figure>
        <div class="text-justify">Digital Partenaire a été fondé en 2025 par Dasse Pascal, un passionné de digital et de technologies web, avec pour objectif d'aider les entreprises locales à se développer en ligne.</div>
   
   
    </x-card>
</div>
</div>



</div>

</div>
