@props(['title'])

<div>
    <h1 class="text-3xl font-bold">
        {{ $title ?? $slot }}
    </h1>
</div>
