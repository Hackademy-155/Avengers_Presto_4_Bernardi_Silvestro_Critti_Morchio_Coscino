<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1 class="article-title">Welcome to yours revision area!</h1>
            </div>
        </div>
        {{-- <section class="p-4 container_fluid"> SEZIONE ULTIMI 5 ARTICOLI DA RICONTROLLARE 
            <div class="row w-100">
                <div class="col-12 d-flex flex-row container-fluid">
                    <div class="row w-100">
                        <div class="col-12 p-3">
                            <h2 class="text-center p-3">{{ __('ui.controlArticle') }}</h2>
                        </div>
                        <div class="col-12 center p-4">
                            <div class="bg-warning p-4 center rounded-5">
                                <div class="center">
                                    <p class="m-0">Legend: </p>
                                </div>
                                <span class="mx-4 center">
                                    <div class="accepted"></div>
                                    <span>{{ __('ui.accepted') }}</span>
                                </span>
                                <span class="center">
                                    <div class="denied"></div>
                                    <span>{{ __('ui.denied') }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-12 container-fluid">
        <div class="col-12 rounded-5 bg-light p-5">
            <div class="row">
                <div class="col-4 center mb-3">
                    <p>{{ __('ui.titleCreate') }}</p>
                </div>
                <div class="col-4 center mb-3">
                    <p>Status</p>
                </div>
                <div class="col-4 center mb-3">
                    <p>CheckButton</p>
                </div>
                @foreach ($articles_to_review as $articleReview)
                    <div class="col-4 center">
                        <p>{{ $articleReview->title }}</p>
                    </div>
                    <div class="col-4 center">
                        @if ($articleReview->is_accepted == 1)
                            <div class="accepted">
                            </div>
                        @elseif($articleReview->is_accepted == 0)
                            <div class="denied">
                            </div>
                        @endif
                    </div>
                    <div class="col-4 center">
                        <form action="{{ route('new.revisor', $articleReview) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Check again</button>
                        </form>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    <hr class="separationBar">
    </section> --}}

    @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-5 alert alert-success text-center shadow-lg rounded-3 p-4">
                {{ session('message') }}
            </div>
        </div>
    @elseif ($article_to_check)
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
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="row justify-content-center">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-6 col-md-4 mb-4 text-center">
                            <img src="https://picsum.photos/300" class="img-fluid rounded-3 shadow-sm"
                                alt="Placeholder image">
                        </div>
                    @endfor
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
