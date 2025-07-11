<?php

use Illuminate\Support\Facades\{Auth, Session};
use Livewire\Volt\Component;
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

<div> <!-- Élément parent unique pour tout le contenu -->
    <x-nav sticky full-width>
        <!-- Brand à gauche -->
        <x-slot:brand>
            <input type="checkbox" id="main-drawer" class="hidden peer">
            <label for="main-drawer" class="mr-3 lg:hidden cursor-pointer">
                <x-icon name="o-bars-3" />
            </label>
            <a href="/" wire:navigate>
                <x-app-brand />
            </a>
        </x-slot:brand>

        <!-- Actions à droite -->
        <x-slot:actions>
            <div class="hidden lg:block">
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
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="lg:hidden peer-checked:block hidden">
                <div class="flex flex-col space-y-2">
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
                        <!-- <x-menu-item title="Blog" link="{{ route('services.blog') }}"
                            class="btn-outline hover:text-white" />
                        <x-menu-separator /> -->
                        <x-menu-item title="Marketing Digital" link="{{ route('services.marketing-digital') }}"
                            class="btn-outline hover:bg-gray-300 hover:text-white" />
                    </x-dropdown>
                    <x-menu>
                        <x-menu-item title="Contact" link="{{ route('contact') }}"
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
                </div>
            </div>
        </x-slot:actions>
    </x-nav>
</div> <!-- Fin de l'élément parent -->


