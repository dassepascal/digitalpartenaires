<?php

use Livewire\Volt\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\{Auth, Session};

new class extends Component {
    public Collection $menus;

    public function mount(Collection $menus): void
    {
        $this->menus = $menus;
    }
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
        <x-menu-item title="{{ __('Administration') }}" icon="s-building-office-2" link="{{ route('admin.blog.dashboard') }}" />
        @endif
        <x-menu-separator />
        <x-menu-item title="{{ __('My profile') }}" icon="o-user" link="{{ route('profile') }}" />
        <x-menu-item title="{{ __('My addresses') }}" icon="o-map-pin" link="{{ route('addresses') }}" />
        <x-menu-item title="{{ __('RGPD') }}" icon="o-lock-closed" link="#" />
        <x-menu-separator />
        @foreach ($menus as $menu)
        @if($menu->submenus->isNotEmpty())
        <x-menu-sub title="{{ $menu->label }}">
            @foreach ($menu->submenus as $submenu)
            <x-menu-item
                title="{{ $submenu->label }}"
                link="{{ str_starts_with($submenu->link, '/category/') ? '/blog' . $submenu->link : $submenu->link }}" />
            @endforeach
        </x-menu-sub>
        @else
        <x-menu-item
            title="{{ $menu->label }}"
            link="{{ str_starts_with($menu->link, '/category/') ? '/blog' . $menu->link : $menu->link }}" />
        @endif
        @endforeach
           @auth
                    @if ($user->favoritePosts()->exists())
                    <a class="ps-2"  title="{{ __('Favorites posts') }}" href="{{ route('posts.favorites') }}"><x-icon name="s-star"
                            class="w-7 h-7" /></a>
                    @endif
                    @endauth
        <x-menu-item title="{{ __('Contact') }}" icon="o-envelope" link="{{ route('blog.contact') }}" />
        @else
        <x-menu-item title="{{ __('Login') }}" link="/login" />
        <x-menu-separator />
        <x-menu-item title="{{ __('Articles') }}" icon="" link="{{ route('blog.index') }}" />
        @foreach ($menus as $menu)
        @if($menu->submenus->isNotEmpty())
        <x-menu-sub title="{{ $menu->label }}">
            @foreach ($menu->submenus as $submenu)
            <x-menu-item
                title="{{ $submenu->label }}"
                link="{{ str_starts_with($submenu->link, '/category/') ? '/blog' . $submenu->link : $submenu->link }}" />
            @endforeach
        </x-menu-sub>
        @else
        <x-menu-item
            title="{{ $menu->label }}"
            link="{{ str_starts_with($menu->link, '/category/') ? '/blog' . $menu->link : $menu->link }}" />
        @endif
        @endforeach
        @auth
        @if ($user->favoritePosts()->exists())
        <a title="{{ __('Favorites posts') }}" href="{{ route('posts.favorites') }}"><x-icon name="s-star"
                class="w-7 h-7" /></a>
        @endif
        @endauth
        <x-menu-item title="{{ __('Contact') }}" icon="o-envelope" link="{{ route('blog.contact') }}" />
        @endif
  <x-menu-item title="{{ __('Digital partenaire') }}" icon="" link="{{ route('index') }}" />
    </x-menu>
</div>
