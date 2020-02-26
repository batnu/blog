<header class="container-flex space-between">
    <div class="date">
        <span class="c-gris">{{ optional($post->published_at)->format('M d')}}  @if($post->owner) / {{ $post->owner->name }} @endif </span>
    </div>
    @if($post->category)
        <div class="post-category">
            <span class="category text-capitalize">
                <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
            </span>
            <span>
                <h1>Visitas: {{ $post->visits }}</h1>
            </span>
        </div>
    @endif
</header>
