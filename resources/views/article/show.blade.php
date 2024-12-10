<x-layout>
    <div class="article-container">
        <section class="article-section">
            <div class="article-image">
                <img src="/media/default/default.jpg" class="image-rounded">
            </div>
            <div class="article-content">
                <h3 class="article-title">{{ $article->title }}</h3>
                <p class="article-description">{{ $article->description }}</p>
                <h4>${{ $article->price }}</h4>
            </div>
            <form method="POST" action="{{ route('article.cancel', $article)}}">
                @csrf
                @method ('PATCH')
                <button type="submit">Annulla Ultima Operazione</button>
            </form>
        </section>
    </div>
</x-layout>
