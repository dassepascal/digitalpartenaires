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
            <x-menu-item title="{{ __('Portfolio') }}" icon="o-briefcase" link="{{ route('portfolio') }}" />
            <x-menu-sub title="Services" icon="o-cog">
                <x-menu-item title="E-commerce" link="{{ route('services.e-commerce') }}"
                    class="btn-outline hover:text-white hover:bg-gray-300" />
                <x-menu-separator />
                <x-menu-item title="Site vitrine" link="{{ route('services.site-vitrine') }}"
                    class="btn-outline hover:text-white" />
                <x-menu-separator />
                <x-menu-item title="Marketing Digital" link="{{ route('services.marketing-digital') }}"
                    class="btn-outline hover:bg-gray-300 hover:text-white" />
            </x-menu-sub>
              <x-menu-item title="{{ __('Blog') }}" icon="o-newspaper" link="{{ route('blog.index') }}" />
            <x-menu-item title="{{ __('Contact') }}" icon="o-envelope" link="#" />
        @else
            <x-menu-item title="{{ __('Login') }}" link="/login" />
             <x-menu-separator />
            <x-menu-item title="{{ __('Portfolio') }}" icon="o-briefcase" link="{{ route('portfolio') }}" />
            <x-menu-sub title="Services" icon="o-cog">
                <x-menu-item title="E-commerce" link="{{ route('services.e-commerce') }}"
                    class="btn-outline hover:text-white hover:bg-gray-300" />
                <x-menu-separator />
                <x-menu-item title="Site vitrine" link="{{ route('services.site-vitrine') }}"
                    class="btn-outline hover:text-white" />
                <x-menu-separator />
                <x-menu-item title="Marketing Digital" link="{{ route('services.marketing-digital') }}"
                    class="btn-outline hover:bg-gray-300 hover:text-white" />
            </x-menu-sub>
              <x-menu-item title="{{ __('Blog') }}" icon="o-newspaper" link="{{ route('blog.index') }}" />
            <x-menu-item title="{{ __('Contact') }}" icon="o-envelope" link="#" />
        @endif

    </x-menu>
</div>
