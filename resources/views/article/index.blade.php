<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center auth-spacing">All articles</h1>
            </div>
        </div>
        <hr class="m-5 hr-color">
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $key=>$article)
                <div class="col-12 col-md-3" id="new2">
                    <x-card :article="$article" key="{{$key}}"/>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="emoji-color">No articles have been added yet</h3>
                    <i class="bi bi-emoji-frown emoji-color fs-1"></i>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            <div>
                {{ $articles->links() }}
            </div>
        </div>
        <hr class="m-5 hr-color">
    </div>
</x-layout>
