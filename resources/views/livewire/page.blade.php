<?php

use Livewire\Volt\Component;
use App\Models\BlogPage;

new class extends Component {

    public BlogPage $page;

    public function mount(BlogPage $page): void
    {
        $this->page = $page;
    }

}; ?>

<div class="container mx-auto bg-blue-500">
    <x-card title="{!! $this->page->title !!}" class="w-full shadow-md shadow-gray-500" shadow separator >
        {!! $this->page->text !!}
    </x-card>
</div>
