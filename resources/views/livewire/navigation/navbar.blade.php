<?php

use Illuminate\Support\Facades\{Auth, Session};
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public string $url;

    public function mount(): void
    {
        $this->url = request()->url();
    }

    public function logout(): void
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirect('/');
    }
    public function isBlogPage(): bool
    {
        return str_contains($this->url, '/blog') || str_contains($this->url, '/category');
    }
};
?>

<div> <!-- Élément parent unique pour tout le contenu -->
    <x-nav sticky full-width>
        <!-- Brand à gauche -->
        <x-slot:brand>
            <label for="main-drawer" class="mr-3 lg:hidden">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
            <a href="{{ $this->isBlogPage() ? route('blog.index') : '/' }}" wire:navigate>
                <x-app-brand />
            </a>
        </x-slot:brand>


        <x-slot:actions>
            <span class="hidden lg:block">
                @if ($this->isBlogPage())
                <div class="flex items-center space-x-4">
                    <!-- Liens statiques -->
                    <x-menu>
                        <x-menu-item title="{{ __('Home') }}" link="{{ route('blog.index') }}"
                            class="btn-outline font-bold border h-12 flex items-center justify-center hover:text-gray-700 hover:bg-gray-100" />
                    </x-menu>
                    <x-menu>
                        <x-menu-item title="{{ __('Articles') }}" link="{{ route('blog.index') }}"
                            class="btn-outline font-bold border h-12 flex items-center justify-center hover:text-gray-700 hover:bg-gray-100" />
                    </x-menu>
                   
                    <x-menu>
                        <x-menu-item title="{{ __('Contact') }}" link="{{ route('contact') }}"
                            class="btn-outline font-bold border h-12 flex items-center justify-center hover:text-gray-700 hover:bg-gray-100" />
                    </x-menu>

                    <!-- Menus dynamiques -->



                    @if ($user = auth()->user())
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button label="{{ $user->name }} {{ $user->firstname }}"
                                class="btn-ghost h-10 flex items-center justify-center" />
                        </x-slot:trigger>

                        <span class="text-black">
                            @if ($user->isAdmin())
                            <x-menu-item title="{{ __('Administration') }}" link="#" />
                            @endif
                            <x-menu-item title="{{ __('My profile') }}" link="{{ route('profile') }}" />
                            <x-menu-item title="{{ __('My addresses') }}" link="{{ route('addresses') }}" />
                            <x-menu-item title="{{ __('My orders') }}" link="#" />
                            <x-menu-item title="{{ __('RGPD') }}" link="#" />
                            <x-menu-item title="{{ __('Logout') }}" wire:click="logout" />
                        </span>
                    </x-dropdown>
                    @else
                    <x-button label="{{ __('Login') }}" link="/login"
                        class="btn-ghost h-10 flex items-center justify-center" />

                    @endif
                    <x-theme-toggle title="{{ __('Toggle theme') }}" class="w-4 h-8" />

                </div>
                @else

                <div class="flex space-x-2 items-center justify-start">
                    <x-menu>
                        <x-menu-item title="Portfolio" link="{{ route('portfolio') }}"
                            class="btn-outline font-bold border py-3 hover:text-white flex items-center hover:bg-gray-300" />
                    </x-menu>
                    <x-dropdown label="Services" class="btn-outline hover:bg-gray-300">
                        <x-menu-item title="E-commerce" link="{{ route('services.e-commerce') }}"
                            class="btn-outline hover:text-white hover:bg-gray-300" />
                        <x-menu-separator />
                        <x-menu-item title="Site vitrine" link="{{ route('services.site-vitrine') }}"
                            class="btn-outline hover:text-white" />
                        <x-menu-separator />

                        <x-menu-item title="Marketing Digital" link="{{ route('services.marketing-digital') }}"
                            class="btn-outline hover:bg-gray-300 hover:text-white" />
                    </x-dropdown>

                    <x-menu>
                        <x-menu-item title="Contact" link="{{ route('contact') }}"
                            class="btn-outline font-bold border py-3 hover:text-white flex items-center hover:bg-gray-300" />
                    </x-menu>
                    <x-menu>
                        <x-menu-item title="Blog" link="{{ route('blog.index') }}"
                            class="btn-outline font-bold border py-3 hover:text-white flex items-center hover:bg-gray-300" />
                    </x-menu>

                    @if ($user = auth()->user())
                    <x-dropdown>
                        <x-slot:trigger>
                            <x-button label="{{ $user->name }} {{ $user->firstname }}" class="btn-ghost" />
                        </x-slot:trigger>
                        <span class="text-black">
                            @if ($user->isAdmin())
                            <x-menu-item title="{{ __('Administration') }}" icon="s-building-office-2" link="{{ route('admin') }}" />
                            @endif
                            <x-menu-item title="{{ __('My profile') }}" icon="s-user" link="{{ route('profile') }}" />
                            <x-menu-item title="{{ __('My addresses') }}" icon="s-map-pin" link="{{ route('addresses') }}" />
                            <x-menu-item title="{{ __('RGPD') }}" icon="s-shield-check" link="" />
                            <x-menu-item title="{{ __('Logout') }}" icon="s-arrow-right-on-rectangle" wire:click="logout" />
                        </span>
                    </x-dropdown>
                    @else
                    <x-button label="{{ __('Login') }}" link="/login"
                        class="btn-outline flex items-center hover:bg-gray-300" />
                    @endif
                    <x-theme-toggle title="{{ __('Toggle theme') }}" class="w-4 h-8" />
                </div>
                @endif

            </span>
        </x-slot:actions>
    </x-nav>
</div> <!-- Fin de l'élément parent -->
