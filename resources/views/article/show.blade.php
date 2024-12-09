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
        </section>
    </div>
</x-layout>
