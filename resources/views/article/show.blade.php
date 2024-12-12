<x-layout>
    <section class="container align-items-center">
        <div class="row justify-content-center">
            <div class="col-12 text-center mt-5 mb-2">
                <h1 class="article-title">{{ $article->title }}</h1>
                <p class="text-secondary opacity-50">Click on photos to see more...</p>
                <h4>
                    <a class="article-category" href="{{ route('byCategory', ['category' => $article->category]) }}">
                        {{ $article->category->name }}
                    </a>
                </h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 d-flex justify-content-center">
                <div class="article-carousel">
                    <input type="radio" name="slider" id="article-item-1" class="d-none">
                    <input type="radio" name="slider" id="article-item-2" class="d-none">
                    <input type="radio" name="slider" id="article-item-3" class="d-none">
                    <div class="cards">
                        <label class="card-carousel" for="article-item-1" id="article-image-1">
                            <img src="/media/default/default.jpg" alt="Article Image 1">
                        </label>
                        <label class="card-carousel" for="article-item-2" id="article-image-2">
                            <img src="/media/default/default.jpg" alt="Article Image 2">
                        </label>
                        <label class="card-carousel" for="article-item-3" id="article-image-3">
                            <img src="/media/default/default.jpg" alt="Article Image 3">
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5 d-flex justify-content-center align-items-center">
                <div class="article-content">
                    <h2 class="article-price mb-4">Product Details</h2>
                    <p class="article-description">{{ $article->description }}</p>
                    <h4 class="article-price">${{ $article->price }}</h4>
                    @auth
                        @if (Auth::user()->is_revisor)
                            <form method="POST" action="{{ route('article.cancel', $article) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="delete-btn mt-4">Undo last operation</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </section>
</x-layout>
