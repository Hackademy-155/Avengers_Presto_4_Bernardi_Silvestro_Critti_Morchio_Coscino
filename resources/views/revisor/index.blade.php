<x-layout>

    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-3">
            </div>
        </div>
        
        @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-5 alert alert-success text-center shadow rounded-3 p-4">
                {{ session('message') }}
            </div>
        </div>
        @elseif ($article_to_check)
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="row justify-content-center">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="col-6 col-md-4 mb-4 text-center">
                        <img src="https://picsum.photos/300" class="img-fluid rounded-3 shadow" alt="Placeholder image">
                    </div>
                    @endfor
                </div>
            </div>
            <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                <div>
                    <h1 class="mb-4">{{ $article_to_check->title }}</h1>
                    <h3 class="text-muted">Author: {{ $article_to_check->user->name }}</h3>
                    <h4 class="my-3">{{ $article_to_check->price }}€</h4>
                    <h4 class="fst-italic text-muted">#{{ $article_to_check->category->name }}</h4>
                    <p class="h6 mt-4">{{ $article_to_check->description }}</p>
                </div>

                <div class="d-flex pb-4 justify-content-around mt-4">
                    <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger py-2 px-5 fw-bold rounded-3">Reject</button>
                    </form>
                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success py-2 px-5 fw-bold rounded-3">Accept</button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center align-items-center height-custom text-center">
            <div class="col-12">
                <h1 class="fst-italic display-4 text-muted mb-5">
                    No articles to review
                </h1>
                <a href="{{ route('homepage') }}" class="btn btn-success rounded-3 px-4 py-2"> Go back to homepage</a>
            </div>
        </div>
        @endif
    </div>
</x-layout>
