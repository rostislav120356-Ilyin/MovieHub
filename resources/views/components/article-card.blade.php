@props(['article'])

<article class="card">
    <div class="card-category">{{ $article->category->name }}</div>
    <h3 class="card-title">{{ $article->title }}</h3>
    <p class="card-excerpt">{{ \Illuminate\Support\Str::limit($article->content, 160) }}</p>
    <div class="card-meta">
        <span>✍ {{ $article->author->login }}</span>
        <span>{{ $article->created_at->format('d.m.Y H:i') }}</span>
    </div>
</article>