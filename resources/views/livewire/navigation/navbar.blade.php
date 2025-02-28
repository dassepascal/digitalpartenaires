<?php

use Illuminate\Support\Facades\{Auth, Session};
use Livewire\Volt\Component;
use Livewire\Attributes\On;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public function logout(): void
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirect('/');
    }
};
?>

<x-nav sticky full-width>
    <!-- Brand à gauche -->
    <x-slot:brand>
        <label for="main-drawer" class="mr-3 lg:hidden">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label>
        <a href="/" wire:navigate>
            <x-app-brand />
        </a>
    </x-slot:brand>

   

    <!-- Actions à droite -->
    <x-slot:actions>
        <span class="hidden lg:block">
            @if ($user = auth()->user())
                <x-dropdown>
                    <x-slot:trigger>
                        <x-button label="{{ $user->name }} {{ $user->firstname }}" class="btn-ghost" />
                    </x-slot:trigger>
                    <span class="text-black">
                        <x-menu-item title="{{ __('My profile') }}" link="{{ route('profile') }}" />
                        <x-menu-item title="{{ __('My addresses') }}" link="{{ route('addresses') }}" />
                        <x-menu-item title="{{ __('My orders') }}" link="" />
                        <x-menu-item title="{{ __('RGPD') }}" link="" />
                        <x-menu-item title="{{ __('Logout') }}" wire:click="logout" />
                    </span>
                </x-dropdown>
            @else
                <x-button label="{{ __('Login') }}" link="/login" class="btn-ghost flex items-center " />
            @endif
        </span>
    </x-slot:actions>
</x-nav>