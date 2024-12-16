<x-layout>
    <section class="d-flex justify-content-center align-items-center show">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mt-5 mb-2">
                    <h1 class="article-title">{{ $article->title }}</h1>
                    <p class="text-secondary opacity-75">Click on photos to see more...</p>
                    <h4>
                        <a class="article-category fw-semibold"
                            href="{{ route('byCategory', ['category' => $article->category]) }}">
                            {{ $article->category->name }}
                        </a>
                    </h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 mb-3">
                    @if ($article->images->count() > 1)
                        <div id="carouselExample" class="carousel slide shadow rounded">
                            <div class="carousel-inner">
                                @foreach ($article->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(300, 300) }}"
                                            class="d-block w-100 rounded shadow-sm"
                                            alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else
                        <img src="https://picsum.photos/300" class="rounded shadow"
                            alt="Nessuna foto inserita dall'utente">
                    @endif
                </div>
                <div class="col-12 col-md-5 d-flex justify-content-center align-items-center">
                    <div class="article-content bg-white p-4 rounded shadow-sm border">
                        <h2 class="article-price mb-4 text-primary fw-bold">Product Details</h2>
                        <p class="article-description text-secondary">{{ $article->description }}</p>
                        <h4 class="article-price text-danger fw-bold">${{ $article->price }}</h4>
                        @auth
                            @if (Auth::user()->is_revisor)
                                <form method="POST" action="{{ route('article.cancel', $article) }}" class="mt-4">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger btn-sm shadow">
                                        Undo last operation
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
