<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $search = '';

    public function rules(): array
    {
        return [
            'search' => 'required|string|max:100',
        ];
    }

    public function save()
    {
        $data = $this->validate();

        return redirect('/blog/search/' . $data['search']);
    }
}; ?>

<div>
    <form wire:submit.prevent="save" class="p-4">
        <x-input placeholder="{{ __('Search') }}..." wire:model="search" clearable icon="o-magnifying-glass" />
    </form>
</div>
