<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center auth-spacing">All articles</h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center py-5">
        @forelse ($articles as $article)
        <div class="col-12 col-md-3 ">
            <x-card :article="$article" />
        </div>
        @empty
        <div class="col-12">
            <h3 class="text-center">No articles have been added yet</h3>
            <i class="bi bi-emoji-frown"></i>
        </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>