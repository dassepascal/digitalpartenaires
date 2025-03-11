<?php

use Livewire\Volt\Component;
use App\Models\Page;
use League\CommonMark\ConverterInterface;

new class extends Component {
    public Page $page;

    public function mount(Page $page): void
    {
        $this->page = $page;
    }

    public function getTitleHtmlProperty(): string
    {
        return app(ConverterInterface::class)->convert($this->page->title)->getContent();
    }

    public function save(): void
    {
        $this->page->save();
        $this->redirect('/pages');
    }
}; ?>

<div class="container mx-auto">
    <x-card title="{!! $this->titleHtml !!}" class="w-full shadow-md shadow-gray-500" shadow separator >
        {!! $this->page->text !!}
    </x-card>
</div>

<x-form wire:submit="save">
    <x-input
        label="{{ __('Title') }}"
        wire:model.live.lazy="page.title"
        required
        placeholder="{{ __('Enter page title') }}"
    />

    <x-input
        label="{{ __('Slug') }}"
        wire:model="page.slug"
        required
        placeholder="{{ __('Enter unique slug') }}"
    />

    <x-markdown
        wire:model="page.text"
        label="{{ __('Text') }}"
    />

    <x-slot:actions>
        <x-button
            label="{{ __('Save') }}"
            icon="o-paper-airplane"
            spinner="save"
            type="submit"
            class="btn-primary"
        />
    </x-slot:actions>
</x-form>