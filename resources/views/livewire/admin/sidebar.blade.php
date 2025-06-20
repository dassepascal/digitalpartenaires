<?php

use Illuminate\Support\Facades\{Auth, Session};
use Livewire\Volt\Component;

new class extends Component {
    public function logout(): void
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        $this->redirect('/');
    }
}; ?>

<div>
    <x-menu activate-by-route>
        <x-menu-separator />
        <x-list-item :item="Auth::user()" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
            <x-slot:actions>
                <x-button icon="o-power" wire:click="logout" class="btn-circle btn-ghost btn-xs"
                    tooltip-left="{{ __('Logout') }}" no-wire-navigate />
            </x-slot:actions>
        </x-list-item>
        <x-menu-separator />

        <div class="flex">
            <aside class="w-64 bg-gray-100">
                @if (request()->is('admin/agency*'))
                    @include('livewire.admin.agency.sidebar')
                @elseif (request()->is('admin/blog*'))
                    @include('livewire.admin.blog.sidebar')
                @endif
            </aside>
           
        </div>
    </x-menu>


</div>
