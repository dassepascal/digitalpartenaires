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
        I am using slots here.
     
        <x-slot:figure>
            <img src="{{ asset('storage/photos/pre2.jpg')}}" alt="pre2" />
        </x-slot:figure>
        <div class="text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae praesentium dicta quis quam dolorum aperiam sint excepturi maxime maiores. Dolor velit, molestias sit similique vel modi vero iure optio mollitia!</div>
   
   
    </x-card>
</div>
</div>



</div>

</div>
