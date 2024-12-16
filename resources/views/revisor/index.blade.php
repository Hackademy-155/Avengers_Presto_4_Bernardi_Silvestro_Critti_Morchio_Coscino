<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1 class="article-title">Welcome to your revision area!</h1>
            </div>
        </div>

        <section class="p-4 container-fluid">
            <h2 class="text-center mb-4">Articoli da controllare</h2>
            @if ($article_to_check)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 bg-light p-4 rounded-3">
                        <h3 class="article-title">{{ $article_to_check->title }}</h3>
                        <p class="article-description">{{ $article_to_check->description }}</p>
                        <h4 class="article-price">Prezzo: ${{ $article_to_check->price }}</h4>

                        <div class="d-flex justify-content-around mt-4">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger">Rifiuta</button>
                            </form>
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success">Accetta</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center pt-5">
                    <div class="col-md-8">
                        <div class="row justify-content-center">
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded-3 shadow-sm" alt="Immagine {{$key + 1}} dell'articolo {{ $article_to_check->title }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-12 col-md-6">
                        <h2 class="article-title text-decoration-underline">Nessun articolo da revisionare</h2>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('homepage') }}" class="rounded-pill btn btn-primary text-decoration-none">
                                Torna alla homepage <i class="bi bi-house-door-fill ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </section>

        <section class="p-4 container-fluid">
            <h3 class="text-center mb-4">Ultimi 5 articoli revisionati</h3>
            @if(isset($last_checked_articles) && $last_checked_articles->count() > 0)
                <div class="row">
                    @foreach ($last_checked_articles as $article)
                        <div class="col-12 d-flex justify-content-between mb-3 p-3 bg-light rounded">
                            <span>{{ $article->title }}</span>
                            <span>{{ $article->user->name }}</span>
                            <span>
                                @if ($article->is_accepted)
                                    <span class="text-success">Accettato</span>
                                @else
                                    <span class="text-danger">Rifiutato</span>
                                @endif
                            </span>
                            <span>{{ $article->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">Non ci sono articoli revisionati di recente.</p>
            @endif
        </section>

        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow-lg rounded-3 p-4">
                    {{ session('message') }}
                </div>
            </div>
        @endif
    </div>
</x-layout>
