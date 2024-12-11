<x-layout>
    <x-header/>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center auth-spacing">Recent articles</h1>
            </div>
        </div>
        
        @if (session()->has('errorMessage'))
            <div class="alert alert-danger text-center shadow rounded w-50 mx-auto">
                {{ session('errorMessage') }}
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success d-flex justify-content-center text-center shadow rounded w-50 mx-auto">
                {{ session('message') }}
            </div>
        @endif
        
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3"  id="new">
                    <x-card :article="$article"/>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3 class="emoji-color">No articles have been added yet</h3>
                    <i class="bi bi-emoji-frown emoji-color fs-1"></i>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
