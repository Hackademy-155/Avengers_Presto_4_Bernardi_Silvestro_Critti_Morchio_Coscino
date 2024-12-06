<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center auth-spacing">Articles by categories <span class="fst-italic fw-bold">{{ $category->name }}</span></h1>
            </div>
        </div>
    </div>
    <div class="row height-custom justify-content-center align-items-center py-5">
        @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article" />
            </div>
        @empty
            <div class="col-12 text-center">
                <h3 class="text-center">No articles have been added yet</h3>
                <i class="bi bi-emoji-frown"></i>
                @auth
                    <a class="btn btn-dark my-5" href="{{route('create.article')}}">Instert article</a>
                @endauth
            </div>
        @endforelse
    </div>
</x-layout>
