<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1 class="article-title">Welcome to your revision area!</h1>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow-lg rounded-3 p-4">
                    {{ session('message') }}
                </div>
            </div>
        @elseif ($article_to_check)
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 ps-4 d-flex flex-column justify-content-between mx-auto">
                    <div class="article-content">
                        <h2 class="article-price mb-4">Product Details</h2>
                        <h3 class="article-title">{{ $article_to_check->title }}</h3>
                        <p class="article-description">{{ $article_to_check->description }}</p>
                        <h4 class="article-price">${{ $article_to_check->price }}</h4>
                    </div>
                    <div class="d-flex pb-4 justify-content-around mt-4">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="delete-btn">Reject</button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="accept-btn">Accept</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 col-md-4 mb-4">
                                    <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded shadow"
                                        alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos/300" class="img-fluid rounded-3 shadow-sm"
                                        alt="Placeholder image">
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12 col-md-6">
                    <h2 class="article-title text-decoration-underline">No articles to review</h2>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('homepage') }}" class="rounded-pill reviewer-btn text-decoration-none">
                            Go back to homepage<i class="bi bi-house-door-fill ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layout>
