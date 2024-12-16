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
                    {{-- Controlla se ci sono immagini --}}
                    @if ($article->images->count() > 0)
                        {{-- Genera gli input radio per le immagini dell'articolo --}}
                        @foreach ($article->images as $key => $image)
                            <input type="radio" name="slider" id="article-item-{{ $key + 1 }}" class="d-none" 
                                @if ($loop->first) checked @endif>
                        @endforeach
                
                        <div class="cards">
                            {{-- Genera i label con le immagini dell'articolo --}}
                            @foreach ($article->images as $key => $image)
                                <label class="card-carousel" for="article-item-{{ $key + 1 }}" id="article-image-{{ $key + 1 }}">
                                    <img src="{{ $image->getUrl(300, 300) }}" alt="Article Image {{ $key + 1 }}">
                                </label>
                            @endforeach
                        </div>
                    @else
                        {{-- Nessuna immagine: usa immagine di default --}}
                        <input type="radio" name="slider" id="article-item-1" class="d-none" checked>
                    
                        <div class="cards">
                            {{-- Genera un'unica immagine di default --}}
                            <label class="card-carousel" for="article-item-1" id="article-image-1">
                                <img src="{{ asset('media/default/default.jpg') }}" alt="Default Image 1">
                            </label>
                        </div>
                    @endif
                    
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
