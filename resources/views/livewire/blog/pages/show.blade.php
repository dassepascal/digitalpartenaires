<?php

use App\Models\BlogPage;
use Livewire\Volt\Component;

new class extends Component {
    public BlogPage $page;
    public string $title;

    public function mount(BlogPage $page): void
    {
        if (!$page->active) {
            abort(404);
        }

        $this->page = $page;
        $this->title = $page->title;

        // Debug complet
        logger('=== DEBUG BLOG PAGE ===');
        logger('Title: ' . $page->title);
        logger('Title length: ' . strlen($page->title));
        logger('Title empty: ' . (empty($page->title) ? 'YES' : 'NO'));
        logger('Title null: ' . (is_null($page->title) ? 'YES' : 'NO'));
        logger('All page data: ' . json_encode($page->toArray()));
    }
}; ?>

<div>
    @section('title', $page->seo_title ?? $page->title)
    @section('description', $page->meta_description)
    @section('keywords', $page->meta_keywords)

    <div class="flex justify-end gap-4">
        @auth
        @if (Auth::user()->isAdmin())
        <x-popover>
            <x-slot:trigger>
                <x-button icon="c-pencil-square" link="#" spinner class="btn-ghost btn-sm" />
            </x-slot:trigger>
            <x-slot:content class="pop-small">
                {{ __('Edit this page') }}
            </x-slot:content>
        </x-popover>
        @endif
        @endauth
    </div>

   <x-page-header>
    {{ __($page->title) }}
</x-page-header>
    <div class="relative items-center w-full px-5 py-5 mx-auto prose md:px-12 max-w-7xl ">
        {!! $page->body !!}
    </div>
</div>
