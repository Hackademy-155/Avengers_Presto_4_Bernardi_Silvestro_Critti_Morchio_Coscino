<x-layout>
    <x-header/>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center auth-spacing">Recent articles</h1>
            </div>
        </div>
    </div>
    <div class="row height-custom justify-content-center align-items-center py-5">
        @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article"/>
            </div>
        @empty
            <div class="col-12">
                <h3 class="text-center">No articles have been added yet</h3>
            </div>
        @endforelse
    </div>
</x-layout>