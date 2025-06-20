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
};
?>

<div>
    <x-menu activate-by-route>
        @if ($user = auth()->user())
            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                class="-mx-2 !-my-2 rounded">
                <x-slot:actions>
                    <x-button icon="o-power" wire:click="logout" class="btn-circle btn-ghost btn-xs"
                        tooltip-left="{{ __('Logout') }}" no-wire-navigate />
                </x-slot:actions>
            </x-list-item>
            <x-menu-separator />
            @if ($user->isAdmin())
                <x-menu-item title="{{ __('Administration') }}" icon="s-building-office-2" link="{{ route('admin.dashboard') }}" />
            @endif
            <x-menu-separator />
            <x-menu-item title="{{ __('My profile') }}" icon="o-user" link="{{ route('profile') }}" />
            <x-menu-item title="{{ __('My addresses') }}" icon="o-map-pin" link="{{ route('addresses') }}" />

            <x-menu-item title="{{ __('RGPD') }}" icon="o-lock-closed" link="#" />
            <x-menu-separator />
        @else
            <x-menu-item title="{{ __('Login') }}" link="/login" />
        @endif

    </x-menu>
</div>
