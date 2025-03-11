<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<!-- {{-- @if ()
<x-header title="{{ __('Posts for category ') }} {{ $category->title }}" size="text-2xl sm:text-3xl md:text-4xl" />
@endif --}} -->



<div class="container mx-auto max-w-[700px]">

    @if (session('registered'))
        <x-alert 
            title="{!! session('registered') !!}" 
            icon="s-rocket-launch" 
            class="mb-4 alert-info" 
            dismissible 
        />
    @endif
  
     
    
</div>

