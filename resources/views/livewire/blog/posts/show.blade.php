<?php

use App\Models\Post;
use App\Repositories\PostRepository;
use Livewire\Volt\Component;

new class extends Component {
    public Post $post;
    public int $commentsCount = 0;
    public bool $showComments = false;

    public function mount($slug): void
    {
        $postRepository = new PostRepository();
        $this->post = $postRepository->getPostBySlug($slug);

        if (!$this->post) {
            abort(404, "Post with slug {$slug} not found.");
        }

        $this->commentsCount = $this->post->valid_comments_count ?? 0;
        \Log::debug("Post: {$slug}, Comments count: {$this->commentsCount}");
    }

    public function showComments(): void
    {
        $this->showComments = true;
    }
}; ?>
<div>
    <!-- Debug -->
    <p>Debug: Comments count = {{ $commentsCount }}</p>
    @section('title', $post->seo_title ?? $post->title)
    @section('description', $post->meta_description)
    @section('keywords', $post->meta_keywords)
    <div id="top" class="flex justify-end gap-4">
        <x-popover>
            <x-slot:trigger>
                <x-button class="btn-sm">
                    <a href="{{ url('/category/' . $post->category->slug) }}">{{ $post->category->title }}</a>
                </x-button>
            </x-slot:trigger>
            <x-slot:content class="pop-small">
                @lang('Show this category')
            </x-slot:content>
        </x-popover>
    </div>
    <x-header title="{!! $post->title !!}" subtitle="{{ ucfirst($post->created_at->isoFormat('LLLL')) }}"
        size="text-2xl sm:text-3xl md:text-4xl" />
    ROTATE
    <div class="relative items-center w-full py-5 mx-auto prose md:px-12 max-w-7xl">
        @if ($post->image)
            <div class="flex flex-col items-center mb-4">
                <img src="{{ asset('storage/photos/' . $post->image) }}" alt="{{ $post->title }}" />
            </div>
            <br>
        @endif
        <div class="text-justify">
            {!! $post->body !!}
        </div>
    </div>
    <br>
    <hr>
    <div class="flex justify-between">
        <p>@lang('By ') {{ $post->user->name }}</p>
        <em>
            @if ($commentsCount > 0)
                @lang('Number of comments: ') {{ $commentsCount }}
            @else
                @lang('No comments')
            @endif
        </em>
    </div>
    <div id="bottom" class="relative items-center w-full py-5 mx-auto md:px-12 max-w-7xl">
        @if ($commentsCount > 0)
            <div class="flex justify-center">
                <x-button label="{{ $commentsCount > 1 ? __('View comments') : __('View comment') }}"
                    wire:click="showComments" class="btn-outline" />
            </div>
            @if ($showComments)
                <div class="mt-4">
                    @foreach ($post->validComments as $comment)
                        <div class="p-4 border-b">
                            <p>{{ $comment->content }}</p>
                            <small>By {{ $comment->user->name }} on {{ $comment->created_at->format('d M Y') }}</small>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</div>
