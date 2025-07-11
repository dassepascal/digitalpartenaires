<?php

use App\Models\{ Order, Product, User };
use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new 
#[Title('Dashboard')] 
#[Layout('components.layouts.admin')] 
class extends Component
{

    public bool $openGlance = true;
 
    public function with(): array
	{
		return [
			
			'usersCount'    => User::count(),
		];
	}

}; ?>

<div>
  
    
    <x-collapse wire:model="openGlance" class="shadow-md">
        <x-slot:heading>
            @lang('In a glance')
        </x-slot:heading>
        <x-slot:content class="flex flex-wrap gap-4">
            
            <a href="/" class="flex-grow">
                <x-stat 
                    title="{{ __('Customers') }}" 
                    description="" 
                    value="{{ $usersCount }}" 
                    icon="s-user"
                    class="shadow-hover" />
            </a>
        </x-slot:content>
    </x-collapse>
</div>